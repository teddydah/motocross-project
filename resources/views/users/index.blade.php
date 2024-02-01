@extends('layouts.main')

@section('title')
    Auribail Mx Park | Utilisateurs
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span class="d-none">Liste des utilisateurs</span>
            <h2 class="mb-0">Liste des utilisateurs</h2>
        </div>

        <table class="container table-index table table-striped text-center align-baseline mb-0">
            <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Email</th>
                <th scope="row">Rôle</th>
                <th scope="row">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    @if($user->role == 'admin')
                        <td>Administrateur</td>
                    @else
                        <td>Utilisateur</td>
                    @endif
                    <td>
                        <a class="btn btn-see btn-info btn-outline-light" href="{{ route('users.show', $user->id) }}"
                           title="Voir l'utilisateur">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-secondary btn-outline-light btn-edit m-2"
                           href="{{ route('users.edit', $user->id) }}" title="Modifier l'utilisateur">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-outline-light btn-delete ms-0 me-0" type="submit"
                                    title="Supprimer l'utilisateur"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
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
