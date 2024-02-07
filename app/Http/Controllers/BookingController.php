<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $bookings = Auth::user()->bookings;

        if (Auth::user()->role === 'admin') return view('bookings.index', ['bookings' => Booking::all()]);
        else return view('bookings.index', compact('bookings'));
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('bookings.create', [
            'schedules' => Schedule::all()->sortByDesc(['start_date'])
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id'
        ]);

        $scheduleId = $request->schedule_id;
        $userId = Auth::user()->id;

        // Vérifie si l'utilisateur a déjà une réservation pour ce créneau horaire
        if (Booking::where('user_id', $userId)->where('schedule_id', $scheduleId)->exists()) {
            return redirect()->route('bookings.index')
                ->with('warning', 'Vous êtes déjà inscrit à cet entraînement.');
        }

        $schedule = Schedule::find($request->schedule_id);
        $maxPeople = $schedule->training->max_people;

        // Compte le nombre de réservations pour le créneau horaire actuel
        $currentBookingsCount = Booking::where('schedule_id', $request->schedule_id)->count() + 1;
        $remainingPlaces = $maxPeople - $currentBookingsCount;


        // Vérifie si l'utilisateur peut être ajouté à la liste d'attente
        if ($remainingPlaces <= 0) {
            // Ajoute l'utilisateur à la liste d'attente
            Booking::create([
                'user_id' => $userId,
                'schedule_id' => $scheduleId,
                'waiting_list' => true,
            ]);

            return redirect()->route('bookings.index')
                ->with('info', 'Vous êtes en liste d\'attente pour l\'entraînement ' . strtoupper($schedule->training->name) .
                    ' du ' . date_format(date_create($schedule->start_date), 'd/m/y') . ' de ' .
                    str_replace('h00', 'h', date_format(date_create($schedule->start_date), 'H\hi')) . ' à ' .
                    str_replace('h00', 'h', date_format(date_create($schedule->end_date), 'H\hi')) .
                    '. Vous serez informé s\'il y a des annulations.');
        }

        /*if ($currentBookingsCount >= $maxPeople) {
            return redirect()->route('bookings.index')
                ->with('warning', 'Vous avez atteint le nombre maximum d\'inscriptions pour ce créneau horaire.');
        }*/

        // Vérifie si l'utilisateur a l'âge requis
        $birthDate = Auth::user()->birth_date;
        $userAge = Carbon::parse($birthDate)->age;
        $adultAge = 16;

        $run = $schedule->training->run;

        if ($userAge <= 0) return redirect()->route('bookings.index')
            ->with('warning', 'Vous ne remplissez pas les critères d\'âge requis pour cet entraînement.');
        elseif ($run === 'adult' && $userAge < $adultAge) return redirect()->route('bookings.index')
            ->with('warning', 'Vous ne remplissez pas les critères d\'âge requis pour cet entraînement.');
        elseif ($run === 'kid' && $userAge >= $adultAge) return redirect()->route('bookings.index')
            ->with('warning', 'Vous ne remplissez pas les critères d\'âge requis pour cet entraînement.');

        Booking::create([
            'user_id' => Auth::user()->id,
            'schedule_id' => $request->schedule_id
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Vous vous êtes bien inscrit à l\'entraînement ' . strtoupper($schedule->training->name) .
                ' du ' . date_format(date_create($schedule->start_date), 'd/m/y') . ' de ' .
                str_replace('h00', 'h', date_format(date_create($schedule->start_date), 'H\hi')) . ' à ' .
                str_replace('h00', 'h', date_format(date_create($schedule->end_date), 'H\hi')) .
                '. Il reste ' . $remainingPlaces . ' places pour ce créneau horaire.');
    }

    /**
     * @param Booking $booking
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Booking $booking): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('bookings.show', ['booking' => Booking::find($booking->id)]);
    }

    /**
     * @param Booking $booking
     * @return Factory|View|Application|RedirectResponse|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Booking $booking): Factory|View|Application|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();
        $schedules = Schedule::all();

        if (Auth::id() !== $booking->user_id) return redirect()->route('bookings.index')
            ->with('danger', 'Vous n\'êtes pas autorisé à modifier cette inscription.');

        return view('bookings.edit', compact('booking', 'users', 'schedules'));
    }

    /**
     * @param Request $request
     * @param Booking $booking
     * @return RedirectResponse
     */
    public function update(Request $request, Booking $booking): RedirectResponse
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id'
        ]);

        // Vérifie si l'utilisateur a déjà une réservation pour ce créneau horaire
        if (Booking::where('user_id', Auth::user()->id)->where('schedule_id', $request->schedule_id)->exists()) {
            return redirect()->route('bookings.index')
                ->with('warning', 'Vous êtes déjà inscrit à cet entraînement.');
        }

        if (Auth::id() !== $booking->user_id) return redirect()->route('bookings.index')
            ->with('danger', 'Vous n\'êtes pas autorisé à modifier cette inscription.');

        // Vérifie si l'utilisateur a l'âge requis
        $birthDate = Auth::user()->birth_date;
        $userAge = Carbon::parse($birthDate)->age;
        $adultAge = 16;

        $run = Schedule::find($request->schedule_id)->training->run;

        if ($userAge <= 0 || ($run === 'adult' && $userAge < $adultAge)) return redirect()->route('bookings.index')
            ->with('warning', 'Vous ne remplissez pas les critères d\'âge requis pour cet entraînement.');
        elseif ($run === 'kid' && $userAge >= $adultAge) return redirect()->route('bookings.index')
            ->with('warning', 'Vous ne remplissez pas les critères d\'âge requis pour cet entraînement.');

        $booking->update([
            'user_id' => $booking->user_id,
            'schedule_id' => $request->schedule_id
        ]);

        return redirect()->route('bookings.index')->with('success', 'Inscription mise à jour avec succès.');
    }

    /**
     * @param Booking $booking
     * @return RedirectResponse
     */
    public function destroy(Booking $booking): RedirectResponse
    {
        if (Auth::user()->role === 'admin' || Auth::id() === $booking->user_id) {
            // Vérifie si la réservation est sur la liste d'attente
            $isWaitingList = $booking->waiting_list;

            $booking->delete();

            if ($isWaitingList) return redirect()->route('bookings.index')
                ->with('success', 'Inscription en liste d\'attente supprimée avec succès.');
            else return redirect()->route('bookings.index')
                ->with('success', 'Inscription supprimée avec succès.');
        } else return redirect()->route('bookings.index')
            ->with('danger', 'Vous ne pouvez pas supprimer cette inscription.');
    }
}
