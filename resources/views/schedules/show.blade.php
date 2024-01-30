@extends('layouts.main')

@section('title')
    Auribail Mx Park | Horaire n°{{ $schedule->id }}
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')id
        <div class="section-title container bg-white">
            <span class="d-none">Horaire n°{{ $schedule->id }}</span>
            <h2 class="mb-0">Horaire n°{{ $schedule->id }}</h2>
        </div>

        <table class="container table table-admin table-striped align-middle mb-0">
            <tbody>
            <tr>
                <th scope="row">Date de début :</th>
                <td>{{ \Carbon\Carbon::parse($schedule->start_date)->isoFormat('D MMMM YYYY [•] HH[h]mm') }}</td>
            </tr>
            <tr>
                <th scope="row">Date de fin :</th>
                <td>{{ \Carbon\Carbon::parse($schedule->end_date)->isoFormat('D MMMM YYYY [•] HH[h]mm') }}</td>
            </tr>
            <tr>
                <th scope="row">Club :</th>
                <td>{{ $schedule->training->name }}</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td class="text-center" colspan="2">
                    <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0" href="{{ route('schedules.index') }}"
                       title="Retour à la liste des horaires">Retour</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </section>
@endsection
