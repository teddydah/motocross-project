@extends('layouts.main')

@section('title')
    Auribail Mx Park | {{$club->name}}
@endsection

@section('main')
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <section class="admin">
        <table class="container table table-striped table-light text-center">
            <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Nom</th>
                <th scope="row">Ville</th>
                <th scope="row">Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td>
                    <a class="btn btn-secondary btn-outline-light"
                       href="{{ route('clubs.edit', $club->id) }}">Modifier</a>
                </td>
                <td>
                    <form action="{{ route('clubs.destroy', $club->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-outline-light" type="submit"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce club ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            </tfoot>
            <tbody>
            <tr>
                <td>{{ $club->id }}</td>
                <td>{{ $club->name }}</td>
                <td>{{ $club->city }}</td>
            </tr>
            </tbody>
        </table>
    </section>
@endsection
