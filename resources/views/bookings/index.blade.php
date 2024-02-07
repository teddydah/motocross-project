@extends('layouts.main')

@section('title')
    Auribail Mx Park | Inscriptions
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            @if(Auth::user()->role === 'admin')
                <span class="d-none">Liste des inscriptions</span>
                <h2 class="mb-0">Liste des inscriptions</h2>
            @else
                <span class="d-none">Mes inscriptions</span>
                <h2 class="mb-0">Mes inscriptions</h2>
            @endif
        </div>

        <table class="container table-index table table-striped text-center align-baseline mb-0">
            <thead>
            <tr>
                <th scope="row">Entraînement</th>
                <th scope="row">Horaire</th>
                <th scope="row">Utilisateur</th>
                <th scope="row">Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="4">
                    <a class="btn-add btn btn-primary btn-outline-light" href="{{ route('bookings.create') }}"
                       title="S'inscrire à un entraînement">S'inscrire à un entraînement</a>
                </td>
            </tr>
            </tfoot>
            <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>
                        <a href="{{ route('trainings.show', $booking->schedule->training->id) }}">{{ $booking->schedule->training->name }}</a>
                    </td>
                    <td>
                        <a href="{{ route('schedules.show', $booking->schedule_id) }}">{{ date_format(date_create($booking->schedule->start_date), 'd/m/y') }}
                            • {{ str_replace('h00', 'h', date_format(date_create($booking->schedule->start_date), 'H\hi')) }}
                            à {{ str_replace('h00', 'h', date_format(date_create($booking->schedule->end_date), 'H\hi')) }}</a>
                    </td>
                    <td>
                        <a href="{{ route('users.show', $booking->user_id) }}">{{ $booking->user->firstname }} {{ $booking->user->lastname }}</a>
                    </td>
                    <td>
                        @if(Auth::user()->role === 'admin')
                            <a class="btn btn-secondary btn-outline-light btn-edit-icon m-2"
                               href="{{ route('bookings.edit', $booking->id) }}" title="Modifier la réservation">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endif
                        <form class="d-inline-block" action="{{ route('bookings.destroy', $booking->id) }}"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-outline-light btn-delete-icon ms-0 me-0" type="submit"
                                    title="Supprimer la réservation"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">
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
