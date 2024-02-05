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

    <table class="container table table-admin table-striped align-middle mb-0">
        <tbody>
            <tr>
                <th scope="row">Nom :</th>
                <td>{{ $user->firstname }} {{ $user->lastname }}</td>
            </tr>
            <tr>
                <th scope="row">Email :</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th scope="row">Rôle :</th>
                @if($user->role == 'admin')
                <td>Administrateur</td>
                @else
                <td>Utilisateur</td>
                @endif
            </tr>
            @if($user->license_number !== null)
            <tr>
                <th scope="row">N° de licence :</th>
                <td>{{ $user->license_number }}</td>
            </tr>
            @endif
            @if($user->phone !== null)
            <tr>
                <th scope="row">N° de téléphone :</th>
                <td>{{ wordwrap($user->phone, 2, '.', 1) }}</td>
            </tr>
            @endif
            <tr>
                <th scope="row">Date de naissance :</th>
                <td>{{ date_format(date_create($user->birth_date), 'd/m/Y') }}</td>
            </tr>
            @if($user->address !== null)
            <tr>
                <th scope="row">Adresse :</th>
                <td>{{ $user->address }}</td>
            </tr>
            @endif
            @if($user->zip_code !== null)
            <tr>
                <th scope="row">Code postal :</th>
                <td>{{ $user->zip_code }}</td>
            </tr>
            @endif
            @if($user->city !== null)
            <tr>
                <th scope="row">Ville :</th>
                <td>{{ $user->city }}</td>
            </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td class="text-center" colspan="2">
                    <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0" href="{{ route('users.index') }}"
                        title="Retour à la liste des utilisateurs">Retour</a>
                    <a class="btn btn-secondary btn-outline-light btn-edit m-2"
                        href="{{ route('users.edit', $user->id) }}" title="Modifier l'utilisateur">Éditer
                    </a>
                    <form class="d-inline-block" action="{{ route('users.logout') }}" method="post">
                        @csrf
                        @method('POST')
                        <button class="btn btn-danger btn-outline-light btn-delete ms-0 me-0" type="submit"
                            title="Se déconnecter"
                            onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?')">
                            Déconnexion
                        </button>
                    </form>
                    <form class="d-inline-block" action="{{ route('users.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-outline-light btn-delete ms-0 me-0" type="submit"
                            title="Supprimer l'utilisateur"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
</section>
@endsection