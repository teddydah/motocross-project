<?php

namespace App\Http\Responses;

use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Symfony\Component\HttpFoundation\Response;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * @param $request
     * @return Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application|Response
     */
    public function toResponse($request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application|Response
    {
        return redirect()->route('users.show', Auth::id())
            ->with('success', 'Bienvenue ' . Auth::user()->email . ' !');
    }
}
