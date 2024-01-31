<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Training;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    private array $inputs = [
        'name' => 'required',
        'max_people' => 'required|numeric',
        'track' => 'required',
        'license_type' => 'required',
        'length' => 'nullable|numeric',
        'width' => 'nullable|numeric',
        'address' => 'required',
        'zip_code' => 'required|size:5',
        'city' => 'required',
        'latitude' => 'nullable',
        'longitude' => 'nullable',
        'description' => 'nullable',
        'club_id' => 'required|exists:clubs,id'
    ];

    private array $messages = [
        'max_people' => 'Le champ "max_people" doit être une valeur numérique.',
        'length' => 'Le champ "longueur" doit être une valeur numérique.',
        'width' => 'Le champ "largeur" doit être une valeur numérique.',
        'zip_code' => 'Le code postal doit comporté 5 chiffres.',
        'latitude' => 'Le champ "latitude" doit être une valeur numérique.',
        'longitude' => 'Le champ "longitude" doit être une valeur numérique.'
    ];

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
        return view('trainings.create', ['clubs' => Club::all(), 'trainings' => Training::all()]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->inputs, $this->messages);

        Training::create([
            'name' => $request->name,
            'max_people' => $request->max_people,
            'track' => $request->track,
            'license_type' => $request->license_type,
            'length' => $request->length,
            'width' => $request->width,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'latitude' => str_replace(',', '.', $request->latitude),
            'longitude' => str_replace(',', '.', $request->longitude),
            'description' => $request->description,
            'club_id' => $request->club_id
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
        return view('trainings.edit', ['clubs' => Club::all(), 'training' => Training::find($training->id)]);
    }

    /**
     * @param Request $request
     * @param Training $training
     * @return RedirectResponse
     */
    public function update(Request $request, Training $training): RedirectResponse
    {
        $request->validate($this->inputs, $this->messages);

        Training::find($training->id)->update([
            'name' => $request->name,
            'max_people' => $request->max_people,
            'track' => $request->track,
            'license_type' => $request->license_type,
            'length' => $request->length,
            'width' => $request->width,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'latitude' => str_replace(',', '.', $request->latitude),
            'longitude' => str_replace(',', '.', $request->longitude),
            'description' => $request->description,
            'club_id' => $request->club_id
        ]);

        return redirect()->route('trainings.show', ['training' => $training->id])
            ->with('success', 'Entraînement mis à jour avec succès.');
    }

    /**
     * @param Training $training
     * @return RedirectResponse
     */
    public function destroy(Training $training): RedirectResponse
    {
        $training->delete();
        return redirect()->route('trainings.index')->with('success', 'Entraînement supprimé avec succès.');
    }
}
