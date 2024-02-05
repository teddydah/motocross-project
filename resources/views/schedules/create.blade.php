@extends('layouts.main')

@section('title')
    Auribail Mx Park | Ajouter un horaire
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
            <span class="d-none">AJouter un horaire</span>
            <h2 class="mb-0">Ajouter un horaire</h2>
        </div>
        <form action="{{ route('schedules.store') }}" method="post">
            @csrf
            <table class="container table table-admin table-edit table-striped align-middle mb-0">
                <tbody>
                <tr>
                    <th scope="row"><label for="start_date">Date de début :</label></th>
                    <td>
                        <input type="datetime-local" name="start_date" id="start_date"
                               value="{{ old('start_date', '2024-01-07 10:00') }}"
                               required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="end_date">Date de fin :</label></th>
                    <td>
                        <input type="datetime-local" name="end_date" id="end_date"
                               value="{{ old('end_date', '2024-01-07 12:00') }}"
                               required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="training_id">Entraînement :</label></th>
                    <td>
                        <select name="training_id" id="training_id" required>
                            <option value="">-- Sélectionnez un entraînement --</option>
                            @foreach($trainings as $training)
                                <option value="{{ $training->id }}">{{ $training->name }}</option>
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
                                title="Enregistrer l'horaire">Enregistrer
                        </button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </section>
@endsection
