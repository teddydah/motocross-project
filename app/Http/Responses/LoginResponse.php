<?php

namespace App\Http\Responses;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Symfony\Component\HttpFoundation\Response;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param $request
     * @return RedirectResponse|Response
     */
    public function toResponse($request): RedirectResponse|Response
    {
        if (Auth::user()->role === 'admin') return redirect()->route('users.index')
            ->with('success', 'Bienvenue ' . Auth::user()->email . ' !');
        else return redirect()->route('bookings.index')
            ->with('success', 'Bienvenue ' . Auth::user()->email . ' !');
    }
}
