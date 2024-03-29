@extends('layouts.main')

@section('title')
    Auribail Mx Park | Ajouter un entraînement
@endsection

@section('header')
    @if(Auth::check())
        @include('includes.admin.header')
    @endif
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span class="d-none">AJouter un entraînement</span>
            <h2 class="mb-0">Ajouter un entraînement</h2>
        </div>
        <form action="{{ route('trainings.store') }}" method="post">
            @csrf
            <table class="container table table-admin table-edit table-striped align-middle mb-0">
                <tbody>
                <tr>
                    <th scope="row"><label for="name">Nom :</label></th>
                    <td>
                        <input type="text" name="name" id="name" placeholder="Auribail mx track"
                               value="{{ old('name') }}" required autofocus>
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
                <tr>
                    <th scope="row"><label for="run">Série :</label></th>
                    <td>
                        <select name="run" id="run" required>
                            <option value="">-- Sélectionnez une série --</option>
                            <option value="{{ old('run', 'adult') }}">Adulte</option>
                            <option value="{{ old('run', 'kid') }}">Enfant</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="license_type">Type de licence :</label></th>
                    <td>
                        <select name="license_type" id="license_type" required>
                            <option value="{{ old('license_type', 'ufolep') }}" selected>UFOLEP</option>
                            <option value="{{ old('license_type', 'ffm') }}">FFM</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="length">Longueur (en mètres) :</label></th>
                    <td>
                        <input type="text" name="length" id="length" placeholder="1950"
                               value="{{ old('length') }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="width">Largeur (en mètres) :</label></th>
                    <td>
                        <input type="text" name="width" id="width" placeholder="8"
                               value="{{ old('width') }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="address">Adresse :</label></th>
                    <td>
                        <input type="text" name="address" id="address"
                               placeholder="Le Petayre Rossignol – Lieu dit Peyret"
                               value="{{ old('address') }}"
                               required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="zip_code">Code postal :</label></th>
                    <td>
                        <input type="text" name="zip_code" id="zip_code" placeholder="31190"
                               value="{{ old('zip_code') }}"
                               required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="city">Ville :</label></th>
                    <td>
                        <input type="text" name="city" id="city" placeholder="Auribail" value="{{ old('city') }}"
                               required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="latitude">Latitude :</label></th>
                    <td>
                        <input type="text" name="latitude" id="latitude" placeholder="43.34192221833587"
                               value="{{ old('latitude') }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="longitude">Longitude :</label></th>
                    <td>
                        <input type="text" name="longitude" id="longitude" placeholder="1.357055980850652"
                               value="{{ old('longitude') }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="description">Description :</label></th>
                    <td>
                        <textarea class="align-middle" name="description" id="description"
                                  rows="3">{{ old('description') }}</textarea>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-center" colspan="2">
                        <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0"
                           href="{{ route('trainings.index') }}" title="Retour à la liste des entraînements">Retour</a>
                        <button class="btn btn-success btn-outline-light btn-save m-2" type="submit"
                                title="Enregistrer l'entraînement">Enregistrer
                        </button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </section>
@endsection
