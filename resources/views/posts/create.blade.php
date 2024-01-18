@extends('layouts.main')

@section('contact')
    <form action="{{route('post.store')}}" method="post" role="form" class="php-email-form">
        @csrf
        <div class="row">
            <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email"
                       required>
            </div>
        </div>
        <div class="form-group mt-3">
            <select class="form-select rounded-0" name="subject_id" id="subject_id" required>
                <option selected>-- Sélectionnez un sujet --</option>
                <option value="1">Demande de renseignement</option>
                <option value="2">Suppression de compte</option>
                <option value="3">Autre demande</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Votre message a bien été envoyé. Merci!</div>
        </div>
        <div class="text-center">
            <button class="button" type="submit">Envoyer</button>
        </div>
    </form>
@endsection
