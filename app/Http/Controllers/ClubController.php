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
        return view('club.index', ['clubs' => Club::all()]);
    }

    /**
     * Récupération des données du club pour les affichées sur la page d'accueil (contact)
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function main(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $clubs = Club::all();
        return view('layouts.main', ['clubs' => $clubs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
