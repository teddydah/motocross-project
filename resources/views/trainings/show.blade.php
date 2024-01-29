@extends('layouts.main')

@section('title')
    Auribail Mx Park | {{ $training->name }}
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span>{{ $training->name }}</span>
            <h2 class="mb-0">{{ $training->name }}</h2>
        </div>

        <table class="container table table-admin table-striped align-middle mb-0">
            <tbody>
            <tr>
                <th scope="row">Nom :</th>
                <td>{{ $training->name }}</td>
            </tr>
            <tr>
                <th scope="row">Club :</th>
                <td>{{ $training->club->name }}</td>
            </tr>
            <tr>
                <th scope="row">Nb max de participants :</th>
                <td>{{ $training->max_people }}</td>
            </tr>
            <tr>
                <th scope="row">Piste :</th>
                <td>{{ $training->track === 'mx' ? 'MX' : 'Enfant' }}</td>
            </tr>
            <tr>
                <th scope="row">Type de licence :</th>
                <td>{{ strtoupper($training->license_type) }}</td>
            </tr>
            @if($training->length != null)
                <tr>
                    <th scope="row">Longueur :</th>
                    <td>{{ $training->length }} mètres</td>
                </tr>
            @endif
            @if($training->width != null)
                <tr>
                    <th scope="row">Largeur :</th>
                    <td>{{ $training->width }} mètres</td>
                </tr>
            @endif
            <tr>
                <th scope="row">Adresse :</th>
                <td>{{ $training->address }}</td>
            </tr>
            <tr>
                <th scope="row">Code postal :</th>
                <td>{{ $training->zip_code }}</td>
            </tr>
            <tr>
                <th scope="row">Ville :</th>
                <td>{{ $training->city }}</td>
            </tr>
            @if($training->latitude != null)
                <tr>
                    <th scope="row">Latitude :</th>
                    <td>{{ $training->latitude }}</td>
                </tr>
            @endif
            @if($training->longitude != null)
                <tr>
                    <th scope="row">Longitude :</th>
                    <td>{{ $training->longitude }}</td>
                </tr>
            @endif
            @if($training->description != null)
                <tr>
                    <th scope="row">Description :</th>
                    <td>
                        <ul class="mb-0">
                            <li><?= str_replace('<br />', '<li>', nl2br(htmlspecialchars($training->description))) ?></li>
                        </ul>
                    </td>
                </tr>
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td class="text-center" colspan="2">
                    <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0" href="{{ route('trainings.index') }}"
                       title="Retour à la liste des entraînements">Retour</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </section>
@endsection
