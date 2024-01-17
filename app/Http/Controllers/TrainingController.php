<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Training::all();
        return view('training.index', ['trainings' => $trainings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('training.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "max_people" => "required|numeric",
            "type" => "required",
            "price" => "required|numeric",
            "length" => "numeric",
            "width" => "numeric",
            "address" => "required|string",
            "zip_code" => "required|string",
            "city" => "required|string",
            "latitude" => "numeric",
            "longitude" => "numeric",
        ]);

        Training::create([
            "name" => $request->name,
            "max_people" => $request->max_people,
            "type" => $request->type,
            "price" => $request->price,
            "length" => $request->length,
            "width" => $request->width,
            "address" => $request->address,
            "zip_code" => $request->zip_code,
            "city" => $request->city,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
        ]);

        return redirect()->route('training.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $training = Training::find($id);
        return view('training.edit', ['training' => $training]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string",
            "max_people" => "required|numeric",
            "type" => "required",
            "price" => "required|numeric",
            "length" => "numeric",
            "width" => "numeric",
            "address" => "required|string",
            "zip_code" => "required|string",
            "city" => "required|string",
            "latitude" => "numeric",
            "longitude" => "numeric",
        ]);

        $training = Training::find($id);

        $training->update([
            "name" => $request->name,
            "max_people" => $request->max_people,
            "type" => $request->type,
            "price" => $request->price,
            "length" => $request->length,
            "width" => $request->width,
            "address" => $request->address,
            "zip_code" => $request->zip_code,
            "city" => $request->city,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
        ]);

        return redirect()->route('training.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $training = Training::find($id);
        $training->delete();
        return redirect()->route('training.index');
    }
}
