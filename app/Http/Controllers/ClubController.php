<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clubs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'social_network_link' => 'nullable|url',
            'description' => 'nullable',
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

        return redirect()->route('clubs.index')->with('success', 'Club added successfully');
    }


    public function show(Club $club)
    {
        return view('clubs.show', compact('club'));
    }

    public function edit($id)
    {
        $club = Club::find($id);
        return view('clubs.edit', ['club' => $club]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'social_network_link' => 'nullable|url',
            'description' => 'nullable',
        ]);
        $club = Club::find($id);
        $club->update($validatedData);

        return redirect()->route('clubs.index')->with('success', 'Club updated successfully');
    }

    public function destroy($id)
    {
        $clubs = Club::find($id);
        $clubs->delete();
        return redirect()->route('clubs.index');
    }
}
