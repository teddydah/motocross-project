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
                       @if (auth()->check())
                        @if (auth()->user()->role === 'admin') 
                            <a class="btn btn-secondary btn-outline-light btn-edit m-2"
                            href="{{ route('schedules.edit', $schedule->id) }}" title="Modifier l'horaire">Éditer
                            </a>
                            <form class="d-inline-block" action="{{ route('schedules.destroy', $schedule->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-outline-light btn-delete ms-0 me-0" type="submit"
                                        title="Supprimer l'horaire"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire ?')">Supprimer
                                </button>
                            @endif
                        @endif
                    </form>
                </td>
            </tr>
            </tfoot>
        </table>
    </section>
@endsection
