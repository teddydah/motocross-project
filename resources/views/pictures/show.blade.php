@extends('layouts.main')

@section('title')
    Auribail Mx Park | {{ $picture->description }}
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span>{{ $picture->description }}</span>
            <h2 class="mb-0">{{ $picture->description }}</h2>
        </div>

        <table class="container table table-admin table-striped align-baseline mb-0">
            <tbody>
            <tr>
                <th scope="row">Image :</th>
                <td>{{ $picture->description }}</td>
            </tr>
            <tr>
                <th scope="row">Description :</th>
                <td>{{ $picture->description }}</td>
            </tr>
            <tr>
                <th scope="row">Club :</th>
                <td>{{ $picture->club->name }}</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td class="text-center" colspan="2">
                    <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0" href="{{ route('pictures.index') }}"
                       title="Retour à la liste des photos">Retour</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </section>
@endsection
