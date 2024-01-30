<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Schedule;
use App\Models\Training;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    private array $inputs = [
        'training_id' => 'required|exists:trainings,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ];

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('schedules.index', ['schedules' => Schedule::all()->sortByDesc(['start_date'])]);
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('schedules.create', ['trainings' => Training::all()]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->inputs);

        Schedule::create([
            'training_id' => $request->training_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('schedules.index')->with('success', 'Horaire ajouté avec succès.');
    }

    /**
     * @param Schedule $schedule
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Schedule $schedule): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('schedules.show', ['schedule' => Schedule::find($schedule->id)]);
    }

    /**
     * @param Schedule $schedule
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Schedule $schedule): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('schedules.edit', [
            'trainings' => Training::all(),
            'schedule' => Schedule::find($schedule->id)
        ]);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate($this->inputs);

        $schedule = Schedule::find($schedule->id);

        $schedule->update([
            'training_id' => $request->training_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('schedules.show', ['schedule' => $schedule->id])
            ->with('success', 'Horaire mis à jour avec succès.');
    }

    /**
     * @param Schedule $schedule
     * @return RedirectResponse
     */
    public function destroy(Schedule $schedule): RedirectResponse
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Horaire supprimé avec succès.');
    }
}
