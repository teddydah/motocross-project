@extends('layouts.main')

@section('title')
    Auribail Mx Park | {{ $training->name }}
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span>{{ $training->name }}</span>
            <h2 class="mb-0">{{ $training->name }}</h2>
        </div>

        <form action="{{ route('trainings.update', $training->id) }}" method="post">
            @csrf
            @method('PUT')
            <table class="container table table-admin table-edit table-striped align-middle mb-0">
                <tbody>
                <tr>
                    <th scope="row"><label for="name">Nom :</label></th>
                    <td>
                        <input type="text" name="name" id="name" value="{{ old('name', $training->name) }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="club_id">Club :</label></th>
                    <td>
                        <select name="club_id" id="club_id" required>
                            @foreach($clubs as $club)
                                <option
                                    value="{{ old('club_id', $club->id) }}" {{ $training->club_id == $club->id ? 'selected' : '' }}>{{ $club->name }}</option>
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
                <tr>
                    <th scope="row"><label for="track">Piste :</label></th>
                    <td>
                        <select name="track" id="track" required>
                            <option value="{{ old('track', 'mx') }}" {{ $training->track == 'mx' ? 'selected' : '' }}>
                                MX
                            </option>
                            <option value="{{ old('track', 'kid') }}" {{ $training->track == 'kid' ? 'selected' : '' }}>
                                Enfant
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="license_type">Type de licence :</label></th>
                    <td>
                        <select name="license_type" id="license_type" required>
                            <option
                                value="{{ old('license_type', 'ufolep') }}" {{ $training->license_type == 'ufolep' ? 'selected' : '' }}>
                                UFOLEP
                            </option>
                            <option
                                value="{{ old('license_type', 'ffm') }}" {{ $training->license_type == 'ffm' ? 'selected' : '' }}>
                                FFM
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="length">Longueur (en mètres) :</label></th>
                    <td>
                        <input type="text" name="length" id="length" value="{{ old('length', $training->length) }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="width">Largeur (en mètres) :</label></th>
                    <td>
                        <input type="text" name="width" id="width" value="{{ old('width', $training->width) }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="address">Adresse :</label></th>
                    <td>
                        <input type="text" name="address" id="address" value="{{ old('address', $training->address) }}"
                               required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="zip_code">Code postal :</label></th>
                    <td>
                        <input type="text" name="zip_code" id="zip_code"
                               value="{{ old('zip_code', $training->zip_code) }}"
                               required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="city">Ville :</label></th>
                    <td>
                        <input type="text" name="city" id="city" value="{{ old('city', $training->city) }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="latitude">Latitude :</label></th>
                    <td>
                        <input type="text" name="latitude" id="latitude"
                               value="{{ old('latitude', $training->latitude) }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="longitude">Longitude :</label></th>
                    <td>
                        <input type="text" name="longitude" id="longitude"
                               value="{{ old('longitude', $training->longitude) }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="description">Description :</label></th>
                    <td>
                        <textarea class="align-middle" name="description" id="description"
                                  rows="3">{{ old('description', $training->description) }}</textarea>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-center" colspan="2">
                        <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0"
                           href="{{ route('trainings.index') }}" title="Retour à la liste des entraînements">Retour</a>
                        <button class="btn btn-success btn-outline-light btn-save m-2" type="submit"
                                title="Enregistrer les modifications">Enregistrer
                        </button>
                        <a class="btn btn-secondary btn-outline-light btn-cancel ms-0 me-0"
                           href="{{ route('trainings.show', $training->id) }}"
                           title="Annuler les modifications">Annuler</a>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </section>
@endsection
