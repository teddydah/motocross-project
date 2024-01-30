@extends('layouts.main')

@section('title')
    Auribail Mx Park | Entraînements
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span class="d-none">Liste des entraînements</span>
            <h2 class="mb-0">Liste des entraînements</h2>
        </div>

        <table class="container table table-striped text-center align-baseline mb-0">
            <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Nom</th>
                <th scope="row">Club</th>
                <th scope="row">Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="4">
                    <a class="btn-add btn btn-primary btn-outline-light" href="{{ route('trainings.create') }}"
                       title="Ajouter un entraînement">Ajouter un entraînement</a>
                </td>
            </tr>
            </tfoot>
            <tbody>
            @foreach($trainings as $training)
                <tr>
                    <td>{{ $training->id }}</td>
                    <td>{{ $training->name }}</td>
                    <td>{{ $training->club->name }}</td>
                    <td>
                        <a class="btn btn-see btn-info btn-outline-light"
                           href="{{ route('trainings.show', $training->id) }}" title="Voir l'entraînement">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-secondary btn-outline-light btn-edit m-2"
                           href="{{ route('trainings.edit', $training->id) }}" title="Modifier l'entraînement">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('trainings.destroy', $training->id) }}"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-outline-light btn-delete ms-0 me-0" type="submit"
                                    title="Supprimer l'entraînement"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet entraînement ?')">
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
