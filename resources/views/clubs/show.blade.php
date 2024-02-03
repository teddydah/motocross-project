@extends('layouts.main')

@section('title')
    Auribail Mx Park | {{ $club->name }}
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span class="d-none">{{ $club->name }}</span>
            <h2 class="mb-0">{{ $club->name }}</h2>
        </div>

        <table class="container table table-admin table-striped align-baseline mb-0">
            <tbody>
            <tr>
                <th scope="row">Nom :</th>
                <td>{{ $club->name }}</td>
            </tr>
            <tr>
                <th scope="row">Adresse :</th>
                <td>{{ $club->address }}</td>
            </tr>
            <tr>
                <th scope="row">Code postal :</th>
                <td>{{ $club->zip_code }}</td>
            </tr>
            <tr>
                <th scope="row">Ville :</th>
                <td>{{ $club->city }}</td>
            </tr>
            @if($club->latitude != null)
                <tr>
                    <th scope="row">Latitude :</th>
                    <td>{{ $club->latitude }}</td>
                </tr>
            @endif
            @if($club->longitude != null)
                <tr>
                    <th scope="row">Longitude :</th>
                    <td>{{ $club->longitude }}</td>
                </tr>
            @endif
            <tr>
                <th scope="row">Téléphone :</th>
                <td>{{ wordwrap($club->phone, 2, '.', 1) }}</td>
            </tr>
            <tr>
                <th scope="row">Email :</th>
                <td>{{ $club->email }}</td>
            </tr>
            <tr>
                <th scope="row">Facebook :</th>
                <td>{{ $club->social_network_link }}</td>
            </tr>
            @if($club->description != null)
                <tr>
                    <th scope="row">Description :</th>
                    <td>{{ $club->description }}</td>
                </tr>
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td class="text-center" colspan="2">
                    <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0" href="{{ route('clubs.index') }}"
                       title="Retour à la liste des clubs">Retour</a>
                    <a class="btn btn-secondary btn-outline-light btn-edit m-2"
                       href="{{ route('clubs.edit', $club->id) }}" title="Modifier le club">Éditer
                    </a>
                    <form class="d-inline-block" action="{{ route('clubs.destroy', $club->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-outline-light btn-delete ms-0 me-0" type="submit"
                                title="Supprimer le club"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce club ?')" {{ $club->id === 1 ? 'disabled' : '' }}>
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            </tfoot>
        </table>
    </section>
@endsection
