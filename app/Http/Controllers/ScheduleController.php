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
    public function index()
    {
        $schedule = Schedule::all();
        return view('schedule.index', ['schedule' => $schedule]);
    }

    public function create()
    {
        return view('schedule.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Schedule::create([
            'training_id' => $request->training_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('schedule.index');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $schedule = schedule::find($id);
        return view('schedule.edit', ['schedule' => $schedule]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $schedule = Schedule::find($id);

        $schedule->update([
            'training_id' => $request->training_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('schedule.index');
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect()->route('schedule.index');
    }
}
