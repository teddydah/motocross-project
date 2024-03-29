@extends('layouts.main')

@section('title')
    Auribail Mx Park | Réservation n°{{ $booking->id }}
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
            <span class="d-none">Réservation n°{{ $booking->id }}</span>
            <h2 class="mb-0">Réservation n°{{ $booking->id }}</h2>
        </div>

        <form action="{{ route('bookings.update', $booking->id) }}" method="post">
            @csrf
            @method('PUT')
            <table class="container table table-admin table-edit table-striped align-middle mb-0">
                <tbody>
                <tr>
                    <th scope="row">Utilisateur :</th>
                    <td>{{ $booking->user->firstname }} {{ $booking->user->lastname }} ({{ $booking->user->email }})
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="schedule_id">Horaire :</label></th>
                    <td>
                        <select name="schedule_id" id="schedule_id" required>
                            @foreach($schedules as $schedule)
                                @php
                                    $userAge = Carbon\Carbon::parse(Auth::user()->birth_date)->age;
                                @endphp
                                @if($schedule->training->run === 'adult' && $userAge >= 16)
                                    <option
                                        value="{{ old('schedule_id', $schedule->id) }}" {{ $booking->schedule_id == $schedule->id ? 'selected' : '' }}>
                                        Le {{ date_format(date_create($schedule->start_date), 'd/m/y') }}
                                        de {{ str_replace('h00', 'h', date_format(date_create($schedule->start_date), 'H\hi')) }}
                                        à {{ str_replace('h00', 'h', date_format(date_create($schedule->end_date), 'H\hi')) }}
                                        ({{ $schedule->training->name }} - Adulte)
                                    </option>
                                @elseif($schedule->training->run === 'kid' && $userAge < 16)
                                    <option
                                        value="{{ old('schedule_id', $schedule->id) }}" {{ $booking->schedule_id == $schedule->id ? 'selected' : '' }}>
                                        Le {{ date_format(date_create($schedule->start_date), 'd/m/y') }}
                                        de {{ str_replace('h00', 'h', date_format(date_create($schedule->start_date), 'H\hi')) }}
                                        à {{ str_replace('h00', 'h', date_format(date_create($schedule->end_date), 'H\hi')) }}
                                        ({{ $schedule->training->name }} - Enfant)
                                    </option>
                                @endif
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
                                title="Enregistrer les modifications">Enregistrer
                        </button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </section>
@endsection
