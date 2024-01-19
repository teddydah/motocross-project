<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pictures = Picture::all();
        return view('pictures.index', ['pictures' => $pictures]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clubs = Club::all();
        return view('pictures.create', compact('clubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "image" => "required|image|mimes:png,jpg,jpeg,webp",
            "description" => "required|string",
            'club_id' => "required|exists:clubs,id"
        ]);

        \Tinify\setKey(env("TINY_PNG_API_KEY"));
        $pictures = $request->file("image");
        $count = 1;
        while (file_exists(public_path("img/portfolio/" . "portfolio-" . $count . "." . $pictures->getClientOriginalExtension())))
            $count++;
        $path = "img/portfolio/" . "portfolio-" . $count . "." . $pictures->getClientOriginalExtension();
        \Tinify\fromFile($pictures->path())->toFile($path);

        Picture::create([
            "image" => $path,
            "description" => $request->description,
            "club_id" => $request->club_id,
        ]);

        return redirect()->route('pictures.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pictures = Picture::find($id);
        $pictures->delete();

        return redirect()->route("pictures.index");

    }
}
