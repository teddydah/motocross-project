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
use SplFileInfo;
use function Tinify\fromFile;
use function Tinify\setKey;

class PictureController extends Controller
{
    private array $inputs = [
        'image' => 'required|image|mimes:png,jpg,jpeg,webp|dimensions:min_height=265,max_width=1920,max_height=1080',
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

        // 1. On récupère le fichier image du formulaire
        $image = $request->file('image');

        // 2. On compresse l'image
        setKey(getenv("TINY_PNG_API_KEY"));
        $imageToCompress = fromFile($image);
        $compressedImage = $imageToCompress->toBuffer();

        // 3. On récupère le nom de l'image avec son extension
        $fileOriginalName = $image->getClientOriginalName();

        // 4. On récupère l'extension du fichier image
        $info = new SplFileInfo($fileOriginalName);
        $extension = $info->getExtension();

        // 5. On soustrait l'extension du nom du fichier image
        $fileName = str_replace('.' . $extension, '', $fileOriginalName);

        // 6. On ajoute un identifiant unique au nom du fichier image sans son extension
        $uniqId = uniqid();

        // 7a. On change la casse de l'image en minuscule
        // 7b. On remplace les éventuels espaces par un tiret
        // 7c. On ajoute l'identifiant unique après un underscore
        $file = strtolower(str_replace(' ', '_', $fileName)) . '_' . $uniqId . '.' . $extension;

        Storage::put($file, $compressedImage);

        Picture::create([
            "image" => $file,
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
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Picture $picture): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('pictures.edit', ['clubs' => Club::all(), 'picture' => Picture::find($picture->id)]);
    }

    /**
     * @param Request $request
     * @param Picture $picture
     * @return RedirectResponse
     */
    public function update(Request $request, Picture $picture): RedirectResponse
    {
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,webp',
            'description' => 'required|string',
            'club_id' => 'required|exists:clubs,id'
        ]);

        $image = $request->file('image');

        // Vérifier si une image est fournie
        if ($image) {
            setKey(getenv("TINY_PNG_API_KEY"));
            $imageToCompress = fromFile($image);
            $compressedImage = $imageToCompress->toBuffer();

            $fileOriginalName = $image->getClientOriginalName();
            $info = new SplFileInfo($fileOriginalName);
            $extension = $info->getExtension();

            $fileName = str_replace('.' . $extension, '', $fileOriginalName);
            $uniqId = uniqid();

            $file = strtolower(str_replace(' ', '_', $fileName)) . '_' . $uniqId . '.' . $extension;

            // Vérifier si le fichier existe déjà avant de l'enregistrer
            if (!Storage::exists($file)) {
                Storage::put($file, $compressedImage);
            }
        }

        // Mettre à jour la bdd avec le nouveau nom de fichier ou l'ancien si aucune nouvelle image n'est fournie
        Picture::find($picture->id)->update([
            "image" => $file ?? $picture->image, // Utiliser l'ancien nom de fichier s'il n'y a pas de nouvelle image
            "description" => $request->description,
            "club_id" => $request->club_id,
        ]);

        return redirect()->route('pictures.show', ['picture' => $picture->id])
            ->with('success', 'Photo mise à jour avec succès.');
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
