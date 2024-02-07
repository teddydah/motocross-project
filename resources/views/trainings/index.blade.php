@extends('layouts.main')

@section('title')
    Auribail Mx Park | Entraînements
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
            <span class="d-none">Liste des entraînements</span>
            <h2 class="mb-0">Liste des entraînements</h2>
        </div>

        <table class="container table table-index table-striped text-center align-baseline mb-0">
            <thead>
            <tr>
                <th scope="row">Nom</th>
                <th scope="row">Club</th>
                <th scope="row">Série</th>
                <th scope="row">Action</th>
            </tr>
            </thead>
            @if(Auth::user()->role === 'admin')
                <tfoot>
                <tr>
                    <td colspan="4">
                        <a class="btn-add btn btn-primary btn-outline-light" href="{{ route('trainings.create') }}"
                           title="Ajouter un entraînement">Ajouter un entraînement</a>
                    </td>
                </tr>
                </tfoot>
            @endif
            <tbody>
            @foreach($trainings as $training)
                <tr>
                    <td>{{ $training->name }}</td>
                    <td>
                        <a href="{{ route('clubs.show', $training->club_id) }}">{{ $training->club->name }}</a>
                    </td>
                    <td>{{ $training->run === 'adult' ? 'Adulte' : 'Enfant' }}</td>
                    <td>
                        <a class="btn btn-see btn-info btn-outline-light"
                           href="{{ route('trainings.show', $training->id) }}" title="Voir l'entraînement">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
