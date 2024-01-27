@extends('layouts.main')

@section('title')
    Auribail Mx Park | Clubs
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span>Liste des clubs</span>
            <h2 class="mb-0">Liste des clubs</h2>
        </div>

        <table class="container table table-striped text-center align-baseline mb-0">
            <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Nom</th>
                <th scope="row">Ville</th>
                <th scope="row">Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="4">
                    <a class="btn-add btn btn-primary btn-outline-light" href="{{ route('clubs.create') }}"
                       title="Ajouter un club">Ajouter un
                        club</a>
                </td>
            </tr>
            </tfoot>
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
                        <a class="btn btn-secondary btn-outline-light btn-edit m-2"
                           href="{{ route('clubs.edit', $club->id) }}" title="Modifier le club">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('clubs.destroy', $club->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-outline-light btn-delete ms-0 me-0" type="submit"
                                    title="Supprimer le club"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce club ?')" {{ $club->id === 1 ? 'disabled' : '' }}>
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
