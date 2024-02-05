@extends('layouts.main')

@section('title')
    Auribail Mx Park | Ajouter un club
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
            <span class="d-none">AJouter un club</span>
            <h2 class="mb-0">Ajouter un club</h2>
        </div>
        <form action="{{ route('clubs.store') }}" method="post">
            @csrf
            <table class="container table table-admin table-edit table-striped align-middle mb-0">
                <tbody>
                <tr>
                    <th scope="row"><label for="name">Nom :</label></th>
                    <td>
                        <input type="text" name="name" id="name" placeholder="Moto-Club Auribail"
                               value="{{ old('name') }}" required autofocus>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="address">Adresse :</label></th>
                    <td>
                        <input type="text" name="address" id="address" placeholder="Mairie de Auribail"
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
                        <input type="text" name="latitude" id="latitude" value="{{ old('latitude') }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="longitude">Longitude :</label></th>
                    <td>
                        <input type="text" name="longitude" id="longitude"
                               value="{{ old('longitude') }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="phone">Téléphone :</label></th>
                    <td>
                        <input type="text" name="phone" id="phone" placeholder="0561507161" value="{{ old('phone') }}"
                               required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="email">E-mail :</label></th>
                    <td>
                        <input type="email" name="email" id="email" placeholder="daniel.raymond09@orange.fr"
                               value="{{ old('email') }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="social_network_link">Facebook :</label></th>
                    <td>
                        <input type="url" name="social_network_link"
                               placeholder="https://www.facebook.com/auribail.motosport/" id="social_network_link"
                               value="{{ old('social_network_link') }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="description">Description :</label></th>
                    <td>
                        <textarea class="align-middle" name="description" id="description"
                                  placeholder="Auribail Mx Park"
                                  rows="3">{{ old('description') }}</textarea>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-center" colspan="2">
                        <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0"
                           href="{{ route('clubs.index') }}" title="Retour à la liste des clubs">Retour</a>
                        <button class="btn btn-success btn-outline-light btn-save m-2" type="submit"
                                title="Enregistrer le club">Enregistrer
                        </button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </section>
@endsection
