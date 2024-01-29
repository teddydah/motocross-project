@extends('layouts.main')

@section('title')
    Auribail Mx Park | Photo n°{{ $picture->id }}
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span>Photo n°{{ $picture->id }}</span>
            <h2 class="mb-0">Photo n°{{ $picture->id }}</h2>
        </div>

        <form action="{{ route('pictures.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="container table table-admin table-edit table-striped align-middle mb-0">
                <tbody>
                <tr>
                    <th scope="row"><label for="image">Image :</label></th>
                    <td>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                        <input type="file" name="image" id="image" value="{{ old('image', $picture->image) }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="description">Description :</label></th>
                    <td>
                        <input type="text" name="description" id="description"
                               value="{{ old('description', $picture->description) }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="club_id">Club :</label></th>
                    <td>
                        <select name="club_id" id="club_id" required>
                            @foreach($clubs as $club)
                                <option
                                    value="{{ old('club_id', $club->id) }}" {{ $picture->club_id == $club->id ? 'selected' : '' }}>{{ $club->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="max_people">Nb max de participants :</label></th>
                    <td>
                        <input type="text" name="max_people" id="max_people"
                               value="{{ old('max_people', $training->max_people) }}" required>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-center" colspan="2">
                        <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0"
                           href="{{ route('pictures.index') }}" title="Retour à la liste des photos">Retour</a>
                        <button class="btn btn-success btn-outline-light btn-save m-2" type="submit"
                                title="Enregistrer les modifications">Enregistrer
                        </button>
                        <a class="btn btn-secondary btn-outline-light btn-cancel ms-0 me-0"
                           href="{{ route('pictures.show', $picture->id) }}"
                           title="Annuler les modifications">Annuler</a>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </section>
@endsection
