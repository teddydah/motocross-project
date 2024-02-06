<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1>
                <a href="{{ url('/') }}"><img src="{{url('/')}}/img/motocross.png" alt="Logo" class="img-fluid"></a>
                <a href="{{ url('/') }}"><span>Auribail</span> <span>Mx Park</span></a>
            </h1>
        </div>
        <nav id="navbar" class="navbar navbar-home">
            @if(Route::currentRouteName() == 'home')
                <ul>
                    <li><a class="nav-link scrollto" href="#about">À propos</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Photos</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

                    @if(Auth::check())
                        <li class="dropdown">
                            <a class="{{ Route::currentRouteName() == 'users.show' || Route::currentRouteName() == 'users.edit' ? 'active' : '' }}"
                               href="#"><span>Mon compte</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a class="user {{ Route::currentRouteName() == 'users.show' ? 'active' : '' }}"
                                       href="{{ route('users.show', ['user' => Auth::user()->id]) }}">{{ Auth::user()->email }}</a>
                                </li>
                                <li>
                                    <a class="{{ Route::currentRouteName() == 'users.edit' ? 'active' : '' }}"
                                       href="{{ route('users.edit', ['user' => Auth::user()->id]) }}">Modifier mon
                                        profil</a>
                                </li>
                                <li>
                                    <a class="nav-link scrollto" href="{{ url('/logout') }}" title="Se déconnecter">Se
                                        déconnecter</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="dropdown"><a href="#"><span>Mon compte</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a class="nav-link scrollto" href="{{ url('/login') }}" title="Se connecter">Se
                                        connecter</a>
                                </li>
                                <li>
                                    <a class="nav-link scrollto" href="{{ url('/register') }}"
                                       title="Créer un compte">Créer un compte</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            @elseif(Route::currentRouteName() == 'login')
                <ul>
                    <li>
                        <a class="nav-link scrollto" href="{{ url('/') }}"
                           title="Retour à la page d'accueil">Accueil</a></li>

                    <li>
                        <a class="nav-link scrollto" href="{{ url('/register') }}" title="Créer un compte">Créer un
                            compte</a>
                    </li>
                </ul>
            @else
                <ul>
                    <li>
                        <a class="nav-link scrollto" href="{{ url('/') }}"
                           title="Retour à la page d'accueil">Accueil</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="{{ url('/login') }}" title="Se connecter">Se
                            connecter</a>
                    </li>
                </ul>
            @endif
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
