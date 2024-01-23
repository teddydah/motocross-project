@extends('layouts.main')

@section('title')
    Auribail Mx Park | Clubs
@endsection

@section('main')
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <section class="admin">
        <table class="container table table-striped table-dark text-center align-baseline mb-0">
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
                <td colspan="4">
                    <a class="btn-add btn btn-primary btn-outline-light m-3" href="{{ route('clubs.create') }}">Ajouter un
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
                        <a class="btn btn-see btn-info btn-outline-light" href="{{ route('clubs.show', $club->id)  }}">Voir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
