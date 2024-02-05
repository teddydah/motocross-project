@extends('layouts.main')

@section('title')
    Auribail Mx Park | Créer un compte
@endsection

@section('header')
    @include('includes.home.header')
@endsection

@section('main')
    <section class="ftco-section register admin">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last"></div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100 text-center">
                                    <h3 class="mb-4 text-uppercase fw-bold">Créer un compte</h3>
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label mb-2" for="firstname">Prénom</label>
                                    <input class="form-control rounded-0" type="text" id="firstname" name="firstname"
                                           placeholder="Prénom" required
                                           autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label mb-2" for="lastname">Nom</label>
                                    <input class="form-control rounded-0" type="text" id="lastname" name="lastname"
                                           placeholder="Nom" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label mb-2" for="email">Email</label>
                                    <input class="form-control rounded-0" id="email" type="email" name="email"
                                           placeholder="Email"
                                           required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label mb-2" for="license_number">Numéro de licence</label>
                                    <input class="form-control rounded-0" id="license_number" type="text"
                                           name="license_number"
                                           placeholder="Numéro de licence">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label mb-2" for="phone">Numéro de téléphone</label>
                                    <input class="form-control rounded-0" id="phone" type="text" name="phone"
                                           placeholder="Numéro de téléphone">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label mb-2" for="birth_date">Date de naissance</label>
                                    <input class="form-control rounded-0" id="birth_date" type="date" name="birth_date"
                                           required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label mb-2" for="address">Adresse</label>
                                    <input class="form-control rounded-0" id="address" type="text" name="address"
                                           placeholder="Adresse">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label mb-2" for="zip_code">Code postal</label>
                                    <input class="form-control rounded-0" id="zip_code" type="text" name="zip_code"
                                           minlength="5" maxlength="5"
                                           placeholder="Code postal">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label mb-2" for="city">Ville</label>
                                    <input class="form-control rounded-0" id="city" type="text" name="city"
                                           placeholder="Ville">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label mb-2" for="password">Mot de passe</label>
                                    <input class="form-control rounded-0" id="password" type="password" name="password"
                                           placeholder="Mot de passe"
                                           autocomplete="new-password" required>
                                </div>
                                <div class="form-group mb-3 d-none password-confirmation">
                                    <label class="label mb-2" for="password_confirmation">Confirmer le mot de
                                        passe</label>
                                    <input class="form-control rounded-0" id="password_confirmation" type="password"
                                           name="password_confirmation"
                                           placeholder="Confirmer le mot de passe"
                                           required>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                            class="form-control btn-dark-blue btn btn-primary submit fw-semibold px-3">
                                        Enregistrer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
