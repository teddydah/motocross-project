@extends('layouts.main')

@section('title')
    Auribail Mx Park | {{ $picture->description }} n°{{ $picture->id }}
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span class="d-none">{{ $picture->description }} n°{{ $picture->id }}</span>
            <h2 class="mb-0">{{ $picture->description }} n°{{ $picture->id }}</h2>
        </div>

        <table class="container table table-admin table-striped align-baseline mb-0">
            <tbody>
            <tr>
                <td colspan="2" class="text-center">
                    <img class="w-25" src="{{ url('uploads/' . $picture->image) }}" alt="{{ $picture->description }}"
                         title="{{ $picture->image }}">
                </td>
            </tr>
            <tr>
                <th scope="row">Nom de l'image :</th>
                <td>{{ $picture->image }}</td>
            </tr>
            <tr>
                <th scope="row">Description :</th>
                <td>{{ $picture->description }}</td>
            </tr>
            <tr>
                <th scope="row">Club :</th>
                <td>{{ $picture->club->name }}</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td class="text-center" colspan="2">
                    <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0" href="{{ route('pictures.index') }}"
                       title="Retour à la liste des photos">Retour</a>
                    <a class="btn btn-secondary btn-outline-light btn-edit m-2"
                       href="{{ route('pictures.edit', $picture->id) }}" title="Modifier la photo">Éditer
                    </a>
                    <form class="d-inline-block" action="{{ route('pictures.destroy', $picture->id) }}"
                          method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-outline-light btn-delete ms-0 me-0" type="submit"
                                title="Supprimer la photo"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette photo ?')">Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            </tfoot>
        </table>
    </section>
@endsection
