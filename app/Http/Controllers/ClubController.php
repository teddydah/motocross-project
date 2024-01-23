<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('clubs.index', ['clubs' => Club::all()]);
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('clubs.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'phone' => 'required',
            'email' => 'required|email',
            'social_network_link' => 'required|url',
            'description' => 'nullable'
        ]);

        Club::create([
            'name' => $request->name,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'phone' => $request->phone,
            'email' => $request->email,
            'social_network_link' => $request->social_network_link,
            'description' => $request->description,
        ]);

        return redirect()->route('clubs.index')->with('success', 'Club ajouté avec succès.');
    }


    /**
     * @param Club $club
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Club $club): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('clubs.show', ['club' => Club::find($club->id)]);
    }

    /**
     * @param $id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('clubs.edit', ['club' => Club::find($id)]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'phone' => 'required',
            'email' => 'required|email',
            'social_network_link' => 'required|url',
            'description' => 'nullable',
        ]);

        Club::find($id)->update($validatedData);

        return redirect()->route('clubs.index')->with('success', 'Club mis à jour avec succès.');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Club::find($id)->delete();
        return redirect()->route('clubs.index');
    }
}
