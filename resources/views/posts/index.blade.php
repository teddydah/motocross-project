@extends('layouts.main')

@section('title')
    Auribail Mx Park | Messages
@endsection

@section('header')
    @include('includes.admin.header')
@endsection

@section('main')
    <section class="admin">
        @include('includes.alert')
        <div class="section-title container bg-white">
            <span class="d-none">Liste des messages</span>
            <h2 class="mb-0">Liste des messages</h2>
        </div>

        <table class="container table-index table table-striped text-center align-baseline mb-0">
            <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Email</th>
                <th scope="row">Motif</th>
                <th scope="row">Action</th>
            </tr>
            </thead>
            <tbody>
            @if($posts === null)
                <tr>
                    <td colspan="4">Il n'y a aucun message.</td>
                </tr>
            @else
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->email }}</td>
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
                        <td>
                            <a class="btn btn-see btn-info btn-outline-light m-2"
                               href="{{ route('posts.show', $post->id) }}"
                               title="Voir le message">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </section>
@endsection
