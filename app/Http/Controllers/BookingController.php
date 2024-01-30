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
        return view('bookings.index', ['bookings' => Booking::with('user', 'schedule')->get()]);
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('bookings.create', [
            'schedules' => Schedule::all()->sortByDesc(['start_date']),
            'users' => User::all()
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Réservation ajoutée avec succès.');
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
            'user_id' => 'required|exists:users,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        // Vérifier si l'utilisateur authentifié est le propriétaire de la réservation
        // TODO
        if (Auth::id() !== $booking->user_id) {
            return redirect()->route('bookings.index')
                ->with('errors', 'Vous n\'êtes pas autorisé à modifier cette réservation.');
        }

        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    /**
     * @param Booking $booking
     * @return RedirectResponse
     */
    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Réservation supprimée avec succès.');
    }
}
