<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('trainings.index', ['trainings' => Training::all()]);
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('trainings.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                "name" => "required|string",
                "max_people" => "required|numeric",
                "track" => "required",
                "price" => "required|numeric",
                "length" => "numeric",
                "width" => "numeric",
                "address" => "required|string",
                'zip_code' => 'required|size:5',
                "city" => "required|string",
                "latitude" => "numeric",
                "longitude" => "numeric",
                "description" => "nullable"
            ],
            [
                'zip_code' => 'Le code postal doit comporté 5 chiffres.'
            ]
        );

        Training::create([
            "name" => $request->name,
            "max_people" => $request->max_people,
            "track" => $request->type,
            "price" => $request->price,
            "length" => $request->length,
            "width" => $request->width,
            "address" => $request->address,
            "zip_code" => $request->zip_code,
            "city" => $request->city,
            "latitude" => str_replace(',', '.', $request->latitude),
            'longitude' => str_replace(',', '.', $request->longitude),
            "description" => $request->description
        ]);

        return redirect()->route('trainings.index')->with('success', 'Entraînement ajouté avec succès.');
    }

    /**
     * @param Training $training
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Training $training): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('trainings.show', ['training' => Training::find($training->id)]);
    }

    /**
     * @param Training $training
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Training $training): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('trainings.edit', ['training' => Training::find($training->id)]);
    }

    /**
     * @param Request $request
     * @param Training $training
     * @return RedirectResponse
     */
    public function update(Request $request, Training $training): RedirectResponse
    {
        $request->validate([
            "name" => "required|string",
            "max_people" => "required|numeric",
            "track" => "required",
            "price" => "required|numeric",
            "length" => "numeric",
            "width" => "numeric",
            "address" => "required|string",
            "zip_code" => "required|string",
            "city" => "required|string",
            "latitude" => "numeric",
            "longitude" => "numeric",
            "description" => "nullable"
        ]);

        Training::find($training->id)->update([
            "name" => $request->name,
            "max_people" => $request->max_people,
            "track" => $request->type,
            "price" => $request->price,
            "length" => $request->length,
            "width" => $request->width,
            "address" => $request->address,
            "zip_code" => $request->zip_code,
            "city" => $request->city,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "description" => $request->description
        ]);

        return redirect()->route('trainings.show', ['training' => $training->id]);
    }

    /**
     * @param Training $training
     * @return RedirectResponse
     */
    public function destroy(Training $training): RedirectResponse
    {
        Training::find($training->id)->delete();
        return redirect()->route('trainings.index');
    }
}
