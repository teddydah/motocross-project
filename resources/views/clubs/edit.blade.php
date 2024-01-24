@extends('layouts.main')

@section('title')
    Auribail Mx Park | {{$club->name}}
@endsection

@section('main')
    @if ($errors->any())
        <div class="container" style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="admin">
        <div class="section-title container bg-white">
            <span>{{ $club->name }}</span>
            <h2 class="mb-0">{{ $club->name }}</h2>
        </div>

        <form action="{{ route('clubs.update', $club->id) }}" method="post">
            @csrf
            @method('PUT')
            <table class="container table table-admin table-edit table-striped align-middle mb-0">
                <tbody>
                <tr>
                    <th scope="row"><label for="name">Nom :</label></th>
                    <td>
                        <input type="text" name="name" id="name" value="{{ old('name', $club->name) }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="address">Adresse :</label></th>
                    <td>
                        <input type="text" name="address" id="address" value="{{ old('address', $club->address) }}"
                               required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="zip_code">Code postal :</label></th>
                    <td>
                        <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code', $club->zip_code) }}"
                               required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="city">Ville :</label></th>
                    <td>
                        <input type="text" name="city" id="city" value="{{ old('city', $club->city) }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="latitude">Latitude :</label></th>
                    <td>
                        <input type="text" name="latitude" id="latitude" value="{{ old('latitude', $club->latitude) }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="longitude">Longitude :</label></th>
                    <td>
                        <input type="text" name="longitude" id="longitude"
                               value="{{ old('longitude', $club->longitude) }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="phone">Téléphone :</label></th>
                    <td>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $club->phone) }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="email">E-mail :</label></th>
                    <td>
                        <input type="email" name="email" id="email" value="{{ old('email', $club->email) }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="social_network_link">Facebook :</label></th>
                    <td>
                        <input type="url" name="social_network_link" id="social_network_link"
                               value="{{ old('social_network_link', $club->social_network_link) }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="description">Description :</label></th>
                    <td>
                        <textarea class="align-middle" name="description" id="description"
                                  rows="3">{{ old('description', $club->description) }}</textarea>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-center" colspan="2">
                        <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0"
                           href="{{ route('clubs.index') }}" title="Retour à la liste des clubs">Retour</a>
                        <button class="btn btn-success btn-outline-light btn-save m-2" type="submit"
                                title="Enregistrer les modifications">Enregistrer
                        </button>
                        <a class="btn btn-outline-light btn-cancel ms-0 me-0"
                           href="{{ route('clubs.show', $club->id) }}" title="Annuler les modifications">Annuler</a>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </section>
@endsection
