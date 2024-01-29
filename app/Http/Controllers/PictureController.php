<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Picture;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Tinify\fromFile;
use function Tinify\setKey;

class PictureController extends Controller
{
    private array $inputs = [
        'image' => 'required|image|mimes:png,jpg,jpeg,webp',
        'description' => 'required|string',
        'club_id' => 'required|exists:clubs,id'
    ];

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('pictures.index', ['pictures' => Picture::all()]);
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('pictures.create', ['clubs' => Club::all()]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->inputs);

        setKey(getenv("TINY_PNG_API_KEY"));

        $imageToCompress = fromFile($request->file('image'));
        $compressedImage = $imageToCompress->toBuffer();

        $fileName = $request->file('image')->getClientOriginalName();

        Storage::put($fileName, $compressedImage);
        // TODO: renommer image
        /*
         * $source = \Tinify\fromFile($request->file('image')->path());

        $optimizedImage = $source->toBuffer();

        $optimizedFileName = uniqid('optimized_image_') . '.png';
        */


        Picture::create([
            "image" => $fileName,
            "description" => $request->description,
            "club_id" => $request->club_id,
        ]);

        return redirect()->route('pictures.index')->with('success', 'Photo ajoutée avec succès.');
    }

    /**
     * @param Picture $picture
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Picture $picture): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('pictures.show', ['picture' => Picture::find($picture->id)]);
    }

    /**
     * @param Picture $picture
     * @return RedirectResponse
     */
    public function destroy(Picture $picture): RedirectResponse
    {
        Picture::find($picture->id)->delete();
        return redirect()->route("pictures.index")->with('success', 'Photo supprimée avec succès.');;

    }
}
