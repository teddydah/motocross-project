<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('posts.index', ['posts' => Post::all()]);
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('layouts.main', ['clubs' => Club::all()]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if ($request->subject != 'booking' &&
            $request->subject != 'training' &&
            $request->subject != 'account' &&
            $request->subject != 'info' &&
            $request->subject != 'other') {
            return redirect()->route('post.create')
                ->with('error', 'Vous devez sélectionner un motif parmi ceux proposés dans la liste.');
        }

        Post::create($request->all());

        return redirect()->route('post.create')->with('success', 'Votre message a bien été envoyé !');
    }

    /**
     * @param Post $post
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Post $post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('posts.show', compact('post'));
    }

    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post supprimé avec succès');
    }
}
