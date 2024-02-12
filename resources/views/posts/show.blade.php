@extends('layouts.main')

@section('title')
    Auribail Mx Park | Message n°{{ $post->id }}
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
            <span class="d-none">Message n°{{ $post->id }}</span>
            <h2 class="mb-0">Message n°{{ $post->id }}</h2>
        </div>

        <table class="container table table-admin table-striped align-middle mb-0">
            <tbody>
            <tr>
                <th scope="row">Nom :</th>
                <td>{{ $post->name }}</td>
            </tr>
            <tr>
                <th scope="row">Email :</th>
                <td>{{ $post->email }}</td>
            </tr>
            <tr>
                <th scope="row">Date :</th>
                <td>{{ date_format(date_create($post->created_at), 'd/m/Y') }}</td>
            </tr>
            <tr>
                <th scope="row">Heure :</th>
                <td>{{ date_format(date_create($post->created_at), 'H\hi') }}</td>
            </tr>
            <tr>
                <th scope="row">Motif :</th>
                @if($post->subject == 'booking')
                    <td>Réservations</td>
                @elseif($post->subject == 'training')
                    <td>Entraînements</td>
                @elseif($post->subject == 'account')
                    <td>Gestion de votre compte</td>
                @elseif($post->subject == 'info')
                    <td>Demande d'informations</td>
                @else
                    <td>Autre demande</td>
                @endif
            </tr>
            <tr>
                <td class="text-justify" colspan="2">{{ $post->message }}</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td class="text-center" colspan="2">
                    <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0" href="{{ route('posts.index') }}"
                       title="Retour à la liste des messages">Retour</a>
                       @if (auth()->check())
                        @if (auth()->user()->role === 'admin') 
                            <form class="d-inline-block" action="{{ route('posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-outline-light btn-delete m-2" type="submit"
                                        title="Supprimer le message"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?')">Supprimer
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
