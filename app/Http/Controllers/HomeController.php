<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Training;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class HomeController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function main(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('home', [
            'training' => Training::find(1),
            'club' => Club::find(1)
        ]);
    }
}
