@extends('layouts.main')

@section('title')
    Auribail Mx Park | Clubs
@endsection

@section('header')
    @if(Auth::check())
        @include('includes.admin.header')
    @endif
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span class="d-none">Liste des clubs</span>
            <h2 class="mb-0">Liste des clubs</h2>
        </div>

        <table class="container table table-striped text-center align-baseline mb-0">
            <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Nom</th>
                <th scope="row">Ville</th>
                <th scope="row">Action</th>
            </tr>
            </thead>
            @if(Auth::user()->role === 'admin')
                <tfoot>
                <tr>
                    <td colspan="4">
                        <a class="btn-add btn btn-primary btn-outline-light" href="{{ route('clubs.create') }}"
                           title="Ajouter un club">Ajouter un
                            club</a>
                    </td>
                </tr>
                </tfoot>
            @endif
            <tbody>
            @foreach($clubs as $club)
                <tr>
                    <td>{{ $club->id }}</td>
                    <td>{{ $club->name }}</td>
                    <td>{{ $club->city }}</td>
                    <td>
                        <a class="btn btn-see btn-info btn-outline-light" href="{{ route('clubs.show', $club->id) }}"
                           title="Voir le club">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
