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
            <!-- TODO -->
            </tbody>
            <tfoot>
            <tr>
                <td class="text-center" colspan="2">
                    <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0" href="{{ route('users.index') }}"
                       title="Retour à la liste des utilisateurs">Retour</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </section>
@endsection
