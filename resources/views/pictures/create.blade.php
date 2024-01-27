@extends('layouts.main')

@section('title')
    Auribail Mx Park | Ajouter une photo
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span>AJouter une photo</span>
            <h2 class="mb-0">Ajouter une photo</h2>
        </div>
        <form action="{{ route('pictures.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="container table table-admin table-edit table-striped align-middle mb-0">
                <tbody>
                <tr>
                    <th scope="row"><label for="image">Image :</label></th>
                    <td>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                        <input type="file" name="image" id="image" value="{{ old('image') }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="description">Description :</label></th>
                    <td>
                        <input type="text" name="description" id="description" placeholder="#TODO"
                               value="{{ old('description') }}">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="club_id">Club :</label></th>
                    <td>
                        <select name="club_id" id="club_id" required>
                            <option value="">-- Sélectionnez un club --</option>
                            @foreach($clubs as $club)
                                <option value="{{ $club->id }}">{{ $club->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-center" colspan="2">
                        <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0"
                           href="{{ route('pictures.index') }}" title="Retour à la liste des photos">Retour</a>
                        <button class="btn btn-success btn-outline-light btn-save m-2" type="submit"
                                title="Enregistrer la photo">Enregistrer
                        </button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </section>
@endsection
