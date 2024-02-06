@extends('layouts.main')

@section('title')
    Auribail Mx Park | Réserver à un entraînement
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
            <span class="d-none">Réserver à un entraînement</span>
            <h2 class="mb-0">Réserver à un entraînement</h2>
        </div>
        <form action="{{ route('bookings.store') }}" method="post">
            @csrf
            <table class="container table table-admin table-edit table-striped align-middle mb-0">
                <tbody>
                <tr>
                    <th scope="row">Utilisateur :</th>
                    <td>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} ({{ Auth::user()->email }})</td>
                </tr>
                <tr>
                    <th scope="row"><label for="schedule_id">Horaire :</label></th>
                    <td>
                        <select name="schedule_id" id="schedule_id" required>
                            <option value="">-- Sélectionnez un horaire --</option>
                            @foreach($schedules as $schedule)
                                <option
                                        value="{{ $schedule->id }}">
                                    Le {{ date_format(date_create($schedule->start_date), 'd/m/y') }}
                                    de {{ str_replace('h00', 'h', date_format(date_create($schedule->start_date), 'H\hi')) }}
                                    à {{ str_replace('h00', 'h', date_format(date_create($schedule->end_date), 'H\hi')) }}
                                    ({{ $schedule->training->name }})
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-center" colspan="2">
                        <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0"
                           href="{{ route('bookings.index') }}" title="Retour à la liste des réservations">Retour</a>
                        <button class="btn btn-success btn-outline-light btn-save m-2" type="submit"
                                title="Enregistrer la réservation">Enregistrer
                        </button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </section>
@endsection
