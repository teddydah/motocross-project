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
        $users = User::all();
        $schedules = Schedule::all();

        return view('bookings.create', compact('users', 'schedules'));
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

        // TODO: message
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    /**
     * @param Booking $booking
     * @return void
     */
    public function show(Booking $booking)
    {
        // TODO
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

        $booking->update($request->all());

        // TODO: message
        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
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
