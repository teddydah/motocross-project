@extends('layouts.main')

@section('title')
    Auribail Mx Park | Inscription
@endsection

@section('main')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="ftco-section register">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last"></div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100 text-center">
                                    <h3 class="mb-4 text-uppercase font-weight-bold">S'inscrire</h3>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('register') }}" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="firstname">Prénom</label>
                                    <input class="form-control" type="text" id="firstname" name="firstname"
                                           placeholder="Prénom" required
                                           autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="lastname">Nom</label>
                                    <input class="form-control" type="text" id="lastname" name="lastname"
                                           placeholder="Nom" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input class="form-control" id="email" type="email" name="email" placeholder="Email"
                                           required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="license_number">Numéro de licence</label>
                                    <input class="form-control" id="license_number" type="text" name="license_number"
                                           placeholder="Numéro de licence">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="phone">Numéro de téléphone</label>
                                    <input class="form-control" id="phone" type="text" name="phone"
                                           placeholder="Numéro de téléphone">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="birth_date">Date de naissance</label>
                                    <input class="form-control" id="birth_date" type="date" name="birth_date" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="address">Adresse</label>
                                    <input class="form-control" id="address" type="text" name="address"
                                           placeholder="Adresse">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="zip_code">Code postal</label>
                                    <input class="form-control" id="zip_code" type="text" name="zip_code"
                                           placeholder="Code postal">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="city">Ville</label>
                                    <input class="form-control" id="city" type="text" name="city" placeholder="Ville">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="password">Mot de passe</label>
                                    <input class="form-control" id="password" type="password" name="password"
                                           placeholder="Mot de passe"
                                           autocomplete="new-password" required>
                                </div>
                                <div class="form-group mb-3 d-none password-confirmation">
                                    <label class="label" for="password_confirmation">Confirmer le mot de passe</label>
                                    <input class="form-control" id="password_confirmation" type="password"
                                           name="password_confirmation"
                                           placeholder="Confirmer le mot de passe"
                                           required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">S'inscrire
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
