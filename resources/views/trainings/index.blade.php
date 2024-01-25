@extends('layouts.main')

@section('title')
    Auribail Mx Park | Entraînements
@endsection

@section('main')
    <section class="admin">
        @include('messages')
        <div class="section-title container bg-white">
            <span>Liste des entraînements</span>
            <h2 class="mb-0">Liste des entraînements</h2>
        </div>

        <table class="container table table-striped text-center align-baseline mb-0">
            <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Nom</th>
                <th scope="row">Club</th>
                <th scope="row">Action</th>
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
                           href="{{ route('trainings.show', $training->id)  }}"
                           title="Voir l'entraînement">Voir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
