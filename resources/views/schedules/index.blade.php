@extends('layouts.main')

@section('title')
    Auribail Mx Park | Horaires
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span class="d-none">Liste des horaires</span>
            <h2 class="mb-0">Liste des horaires</h2>
        </div>

        <table class="container table table-striped text-center align-baseline mb-0">
            <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Horaire</th>
                <th scope="row">Entraînement</th>
                <th scope="row">Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="4">
                    <a class="btn-add btn btn-primary btn-outline-light" href="{{ route('schedules.create') }}"
                       title="Ajouter un horaire">Ajouter un horaire</a>
                </td>
            </tr>
            </tfoot>
            <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ date_format(date_create($schedule->start_date), 'd/m/y') }}
                        • {{ str_replace('h00', 'h', date_format(date_create($schedule->start_date), 'H\hi')) }}
                        à {{ str_replace('h00', 'h', date_format(date_create($schedule->end_date), 'H\hi')) }}</td>
                    <td>{{ $schedule->training->name }}</td>
                    <td>
                        <a class="btn btn-see btn-info btn-outline-light"
                           href="{{ route('schedules.show', $schedule->id) }}"
                           title="Voir l'horaire">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-secondary btn-outline-light btn-edit m-2"
                           href="{{ route('schedules.edit', $schedule->id) }}" title="Modifier l'horaire">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('schedules.destroy', $schedule->id) }}"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-outline-light btn-delete ms-0 me-0" type="submit"
                                    title="Supprimer l'horaire"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire ?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
