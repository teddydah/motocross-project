@extends('layouts.main')

@section('title')
    Auribail Mx Park | Réservation n°{{ $booking->id }}
@endsection

@section('header')
    @include('includes.admin.header')
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
                    <th scope="row"><label for="schedule_id">Horaire :</label></th>
                    <td>
                        <select name="schedule_id" id="schedule_id" required>
                            @foreach($schedules as $schedule)
                                <option
                                    value="{{ old('schedule_id', $schedule->id) }}" {{ $booking->schedule_id == $schedule->id ? 'selected' : '' }}>
                                    Le {{ date_format(date_create($schedule->start_date), 'd/m/y') }}
                                    de {{ str_replace('h00', 'h', date_format(date_create($schedule->start_date), 'H\hi')) }}
                                    à {{ str_replace('h00', 'h', date_format(date_create($schedule->end_date), 'H\hi')) }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="user_id">Utilisateur :</label></th>
                    <td>
                        <select name="user_id" id="user_id" required>
                            @foreach($users as $user)
                                <option
                                    value="{{ old('user_id', $user->id) }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>{{ $user->email }}</option>
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
