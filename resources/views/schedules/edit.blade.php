@extends('layouts.main')

@section('title')
    Auribail Mx Park | Horaire n°{{ $schedule->id }}
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
            <span class="d-none">Horaire n°{{ $schedule->id }}</span>
            <h2 class="mb-0">Horaire n°{{ $schedule->id }}</h2>
        </div>

        <form action="{{ route('schedules.update', $schedule->id) }}" method="post">
            @csrf
            @method('PUT')
            <table class="container table table-admin table-edit table-striped align-middle mb-0">
                <tbody>
                <tr>
                    <th scope="row"><label for="start_date">Date de début :</label></th>
                    <td>
                        <input type="datetime-local" name="start_date" id="start_date"
                               value="{{ old('start_date', $schedule->start_date) }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="end_date">Date de fin :</label></th>
                    <td>
                        <input type="datetime-local" name="end_date" id="end_date"
                               value="{{ old('end_date', $schedule->end_date) }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="training_id">Entraînement :</label></th>
                    <td>
                        <select name="training_id" id="training_id" required>
                            @foreach($trainings as $training)
                                <option
                                        value="{{ old('training_id', $training->id) }}" {{ $schedule->training_id == $training->id ? 'selected' : '' }}>{{ $training->name }}
                                    ({{ $training->run === 'adult' ? 'Adulte' : 'Enfant' }})
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
                           href="{{ route('schedules.index') }}" title="Retour à la liste des horaires">Retour</a>
                        <button class="btn btn-success btn-outline-light btn-save m-2" type="submit"
                                title="Enregistrer les modifications">Enregistrer
                        </button>
                        <a class="btn btn-secondary btn-outline-light btn-cancel ms-0 me-0"
                           href="{{ route('schedules.show', $schedule->id) }}"
                           title="Annuler les modifications">Annuler</a>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </section>
@endsection
