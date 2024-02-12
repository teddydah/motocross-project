<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::find(Auth::id());

        if (Auth::check()) {
            if ($user->role === 'admin') return $next($request);
            else return redirect()->route('users.show', ['user' => Auth::id()]);
        } else return redirect()->route('login')->with('warning', 'Veuillez vous authentifier.');;
    }
}
