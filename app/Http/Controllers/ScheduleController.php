<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('schedules.index', [
            'schedules' => Schedule::all()
        ]);
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('schedules.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Schedule::create($request->all());

        // TODO: message
        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }

    /**
     * @param Schedule $schedule
     * @return void
     */
    public function show(Schedule $schedule)
    {
        // TODO
    }

    /**
     * @param Schedule $schedule
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Schedule $schedule): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('schedules.edit', compact('schedule'));
    }

    /**
     * @param Request $request
     * @param Schedule $schedule
     * @return RedirectResponse
     */
    public function update(Request $request, Schedule $schedule): RedirectResponse
    {
        $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $schedule->update($request->all());

        // TODO: message
        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully.');
    }

    /**
     * @param Schedule $schedule
     * @return RedirectResponse
     */
    public function destroy(Schedule $schedule): RedirectResponse
    {
        $schedule->delete();

        // TODO: message
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}
