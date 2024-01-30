@extends('layouts.main')

@section('title')
    Auribail Mx Park | Photos
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span class="d-none">Liste des photos</span>
            <h2 class="mb-0">Liste des photos</h2>
        </div>

        <table class="container table-index table table-striped text-center align-baseline mb-0">
            <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Image</th>
                <th scope="row">Club</th>
                <th scope="row">Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="4">
                    <a class="btn-add btn btn-primary btn-outline-light" href="{{ route('pictures.create') }}"
                       title="Ajouter une photo">Ajouter une photo</a>
                </td>
            </tr>
            </tfoot>
            <tbody>
            @foreach($pictures as $picture)
                <tr>
                    <td>{{ $picture->id }}</td>
                    <td>
                        <img src="{{ url('uploads/' . $picture->image) }}"
                             alt="{{ $picture->description }}" width="25%">
                    </td>
                    <td>{{ $picture->club->name }}</td>
                    <td>
                        <a class="btn btn-see btn-info btn-outline-light"
                           href="{{ route('pictures.show', $picture->id) }}" title="Voir la photo">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-secondary btn-outline-light btn-edit m-2"
                           href="{{ route('pictures.edit', $picture->id) }}" title="Modifier la photo">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('pictures.destroy', $picture->id) }}"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-outline-light btn-delete ms-0 me-0" type="submit"
                                    title="Supprimer la photo"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette photo ?')">
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
