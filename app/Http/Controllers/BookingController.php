<?php

namespace App\Http\Controllers;

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

        // Vérifie si l'utilisateur a déjà une réservation pour ce créneau horaire
        if (Booking::where('user_id', Auth::user()->id)->where('schedule_id', $request->schedule_id)->exists()) {
            return redirect()->route('bookings.index')
                ->with('warning', 'Vous êtes déjà inscrit à cet entraînement.');
        }

        $schedule = Schedule::find($request->schedule_id);
        $maxPeople = $schedule->training->max_people;

        // Compte le nombre de réservations pour le créneau horaire actuel
        $currentBookingsCount = Booking::where('schedule_id', $request->schedule_id)->count() + 1;
        $remainingPlaces = $maxPeople - $currentBookingsCount;

        if ($currentBookingsCount >= $maxPeople) {
            return redirect()->route('bookings.index')
                ->with('warning', 'Vous avez atteint le nombre maximum d\'inscriptions pour ce créneau horaire.');
        }

        Booking::create([
            'user_id' => Auth::user()->id,
            'schedule_id' => $request->schedule_id
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Vous vous êtes bien inscrit à l\'entraînement ' . strtoupper($schedule->training->name) .
                ' du ' . date_format(date_create($schedule->start_date), 'd/m/y') . ' à ' .
                str_replace('h00', 'h', date_format(date_create($schedule->start_date), 'H\hi')) . ' de ' .
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
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Booking $booking): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();
        $schedules = Schedule::all();

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

        if (Auth::id() !== $booking->user_id || User::find($booking->user_id)->role !== 'admin') {
            return redirect()->route('bookings.index')
                ->with('danger', 'Vous n\'êtes pas autorisé à modifier cette réservation.');
        }

        $booking->update([
            'user_id' => $booking->user_id,
            'schedule_id' => $request->schedule_id
        ]);

        return redirect()->route('bookings.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    /**
     * @param Booking $booking
     * @return RedirectResponse
     */
    public function destroy(Booking $booking): RedirectResponse
    {
        if (Auth::user()->role === 'admin' || Auth::id() === $booking->user_id) $booking->delete();
        else return redirect()->route('bookings.index')
            ->with('danger', 'Vous ne pouvez pas supprimer cette inscription.');

        return redirect()->route('bookings.index')->with('success', 'Inscription supprimée avec succès.');
    }
}
