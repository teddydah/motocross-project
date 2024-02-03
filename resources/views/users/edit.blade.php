@extends('layouts.main')

@section('title')
    Auribail Mx Park | {{ $user->firstname . ' ' . $user->lastname }}
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span class="d-none">{{ $user->firstname . ' ' . $user->lastname }}</span>
            <h2 class="mb-0">{{ $user->firstname . ' ' . $user->lastname }}</h2>
        </div>

        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <table class="container table table-admin table-edit table-striped align-middle mb-0">
                <tbody>
                <tr>
                    <th scope="row"><label for="firstname">Prénom :</label></th>
                    <td>
                        <input type="text" name="firstname" id="firstname"
                               value="{{ old('firstname', $user->firstname) }}"
                               required {{ (Auth::user()->role === 'admin' && Auth::id() === $user->id) ? '' : 'disabled' }}>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="lastname">Nom :</label></th>
                    <td>
                        <input type="text" name="lastname" id="lastname"
                               value="{{ old('lastname', $user->lastname) }}"
                               required {{ (Auth::user()->role === 'admin' && Auth::id() === $user->id) ? '' : 'disabled' }}>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="email">Email :</label></th>
                    <td>
                        <input type="email" name="email" id="email"
                               value="{{ old('email', $user->email) }}"
                               required {{ (Auth::user()->role === 'admin' && Auth::id() === $user->id) ? '' : 'disabled' }}>
                    </td>
                </tr>
                @if(Auth::user()->role === 'admin' && Auth::id() === $user->id)
                    <tr>
                        <th scope="row"><label for="password">Mot de passe :</label></th>
                        <td>
                            <input type="password" name="password" id="password"
                                   placeholder="Saisissez votre nouveau mot de passe">
                        </td>
                    </tr>
                    <tr class="password-confirmation d-none">
                        <th scope="row"><label for="confirm_password">Confirmation du mot de passe :</label></th>
                        <td>
                            <input type="password" name="confirm_password" id="confirm_password"
                                   value="{{ $user->confirm_password }}"
                                   placeholder="Confirmez votre nouveau mot de passe">
                        </td>
                    </tr>
                @endif
                <tr>
                    <th scope="row"><label for="role">Rôle :</label></th>
                    <td>
                        <select name="role" id="role" required {{ Auth::user()->role !== 'admin' ? 'disabled' : '' }}>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Utilisateur</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="license_number">N° de licence :</label></th>
                    <td>
                        <input type="text" name="license_number" id="license_number"
                               value="{{ old('license_number', $user->license_number) }}" {{ (Auth::user()->role === 'admin' && Auth::id() === $user->id) ? '' : 'disabled' }}>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="phone">N° de téléphone :</label></th>
                    <td>
                        <input type="text" name="phone" id="phone"
                               value="{{ old('phone', $user->phone) }}" {{ (Auth::user()->role === 'admin' && Auth::id() === $user->id) ? '' : 'disabled' }}>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="birth_date">Date de naissance :</label></th>
                    <td>
                        <input type="date" name="birth_date" id="birth_date"
                               value="{{ old('birth_date', $user->birth_date) }}" {{ (Auth::user()->role === 'admin' && Auth::id() === $user->id) ? '' : 'disabled' }}>
                    </td>
                </tr>
                <!-- TODO: adresse, ... -->
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-center" colspan="2">
                        <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0"
                           href="{{ route('users.index') }}" title="Retour à la liste des utilisateurs">Retour</a>
                        <button class="btn btn-success btn-outline-light btn-save m-2" type="submit"
                                title="Enregistrer les modifications">Enregistrer
                        </button>
                        <a class="btn btn-secondary btn-outline-light btn-cancel ms-0 me-0"
                           href="{{ route('users.show', $user->id) }}" title="Annuler les modifications">Annuler</a>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </section>
@endsection
