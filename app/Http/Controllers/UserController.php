<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.index', ['users' => User::all()]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request): mixed
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ]);

        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }

    /**
     * @param User $user
     * @return Factory|View|Application|RedirectResponse|\Illuminate\Contracts\Foundation\Application
     */
    public function show(User $user): Factory|View|Application|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (
            (Auth::user()->role === 'user' && Auth::id() !== $user->id) ||
            (Auth::user()->role === 'admin' && Auth::id() !== $user->id && $user->role === 'admin')
        ) {
            return redirect()->route('users.index')
                ->with('danger', 'Vous n\'avez pas le droit d\'accéder à ce profil.');
        }

        return view('users.show', ['user' => User::find($user->id)]);
    }

    /**
     * @param User $user
     * @return Factory|View|Application|RedirectResponse|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(User $user): Factory|View|Application|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (
            (Auth::user()->role === 'user' && Auth::id() !== $user->id) ||
            (Auth::user()->role === 'admin' && Auth::id() !== $user->id && $user->role === 'admin')
        ) {
            return redirect()->route('users.show', ['user' => User::find($user->id)])
                ->with('danger', 'Vous n\'avez pas le droit de modifier ce profil.');
        }
        ;

        return view('users.edit', ['user' => User::find($user->id)]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        if (
            (Auth::user()->role === 'user' && Auth::id() !== $user->id) ||
            (Auth::user()->role === 'admin' && Auth::id() !== $user->id && $user->role === 'admin')
        ) {
            return redirect()->route('users.show', ['user' => User::find($user->id)])
                ->with('danger', 'Vous n\'avez pas le droit de modifier ce profil.');
        }

        $inputsAdmin = [
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'confirm_password' => 'nullable|same:password',
            'role' => 'required',
            'phone' => 'required|size:10',
            'birth_date' => 'required|date',
            'address' => 'nullable',
            'zip_code' => 'nullable|size:5',
            'city' => 'nullable'
        ];

        $inputsUser = [
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'confirm_password' => 'nullable|same:password',
            'phone' => 'required|size:10',
            'birth_date' => 'required|date',
            'address' => 'nullable',
            'zip_code' => 'nullable|size:5',
            'city' => 'nullable'
        ];

        $messages = [
            'password' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'confirm_password' => 'Le champ de confirmation du mot de passe doit correspondre au mot de passe.'
        ];

        if (Auth::user()->role === 'admin' && Auth::id() === $user->id) {
            $request->validate($inputsAdmin, $messages);

            User::find($user->id)->update([
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'email' => $request->email,
                'password' => isset($request->password) ? Hash::make($request->password) : $user->password,
                'role' => $request->role,
                'license_number' => $user->license_number,
                'phone' => $request->phone,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'city' => $request->city,
            ]);
        } elseif (Auth::user()->role === 'admin' && Auth::id() !== $user->id) {
            $request->validate(['role' => 'required']);

            User::find($user->id)->update([
                'lastname' => $user->lastname,
                'firstname' => $user->firstname,
                'email' => $user->email,
                'role' => $request->role,
                'license_number' => $user->license_number,
                'phone' => $user->phone,
                'birth_date' => $user->birth_date,
                'address' => $user->address,
                'zip_code' => $user->zip_code,
                'city' => $user->city,
            ]);
        } elseif (Auth::user()->role === 'user' && Auth::id() === $user->id) {
            $request->validate($inputsUser, $messages);

            User::find($user->id)->update([
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'email' => $request->email,
                'password' => isset($request->password) ? Hash::make($request->password) : $user->password,
                'license_number' => $user->license_number,
                'phone' => $request->phone,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'city' => $request->city,
            ]);
        }
        ;

        return redirect()->route('users.show', ['user' => $user->id])
            ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with(['msg-body' => 'You signed out !']);
    }
}
