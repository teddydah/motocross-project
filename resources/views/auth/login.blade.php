@extends('layouts.main')

@section('title')
    Auribail Mx Park - Login
@endsection

@section('main')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100 h-100 d-flex flex-column justify-content-center">
                                <div>
                                    <h2>Auribail Mx Park</h2>
                                    <p>Vous n'avez pas de compte ?</p>
                                    <a href="{{route('register')}}"
                                       class="btn btn-white btn-outline-white">S'inscrire</a>
                                </div>
                            </div>
                        </div>

                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100 text-center">
                                    <h3 class="mb-4 text-uppercase font-weight-bold">Se connecter</h3>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                           placeholder="Votre Email" required
                                           autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Mot de passe</label>
                                    <input class="form-control" type="password" id="password" name="password"
                                           placeholder="Votre mot de passe" required autocomplete="current-password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Connexion
                                    </button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Se souvenir de moi
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Mot de passe oublié ?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
