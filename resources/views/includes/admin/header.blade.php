<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <h1>
                <a href="{{ url('/') }}"><img src="{{url('/')}}/img/motocross.png" alt="Logo" class="img-fluid"></a>
                <a href="{{ url('/') }}"><span>Auribail</span> <span>Mx Park</span></a>
            </h1>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link scrollto" href="{{ url('/') }}" title="Retour à la page d'accueil">Accueil</a>
                </li>
                <li>
                <li class="dropdown">
                    <a class="{{ Route::currentRouteName() == 'users.show' || Route::currentRouteName() == 'users.edit' ? 'active' : '' }}"
                       href="#"><span>Mon compte</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="user {{ Route::currentRouteName() == 'users.show' ? 'active' : '' }}"
                               href="{{ route('users.show', ['user' => Auth::user()->id]) }}">{{ Auth::user()->email
                                }}</a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteName() == 'users.edit' ? 'active' : '' }}"
                               href="{{ route('users.edit', ['user' => Auth::user()->id]) }}">Modifier mon profil</a>
                        </li>
                        <li>
                            <a class="nav-link scrollto" href="{{ route('logout') }}" title="Se déconnecter">Se
                                déconnecter</a>
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->role === 'admin')
                    <li><a class="nav-link scrollto {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}"
                           href="{{ route('users.index') }}">Utilisateurs</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('posts.index') }}">Messages</a></li>
                @endif
                <li class="dropdown">
                    <a class="{{ Route::currentRouteName() == 'clubs.index' || Route::currentRouteName() == 'clubs.create' ? 'active' : '' }}"
                       href="#"><span>Clubs</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a class="{{ Route::currentRouteName() == 'clubs.index' ? 'active' : '' }}"
                               href="{{ route('clubs.index') }}">Liste des clubs</a></li>
                        <li><a class="{{ Route::currentRouteName() == 'clubs.create' ? 'active' : '' }}"
                               href="{{ route('clubs.create') }}">Ajouter un club</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="{{ Route::currentRouteName() == 'trainings.index' || Route::currentRouteName() == 'trainings.create' ? 'active' : '' }}"
                       href="#"><span>Entraînements</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ Route::currentRouteName() == 'trainings.index' ? 'active' : '' }}" href="{{ route('trainings.index') }}
                            ">Liste des entraînements</a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteName() == 'trainings.create' ? 'active' : '' }}" href="{{ route('trainings.create') }}
                            ">Ajouter un entraînement</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="{{ Route::currentRouteName() == 'schedules.index' || Route::currentRouteName() == 'schedules.create' ? 'active' : '' }}"
                       href="#"><span>Horaires</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a class="{{ Route::currentRouteName() == 'schedules.index' ? 'active' : '' }}"
                               href="{{ route('schedules.index') }}">Liste des horaires</a></li>
                        <li><a class="{{ Route::currentRouteName() == 'schedules.create' ? 'active' : '' }}"
                               href="{{ route('schedules.create') }}">Ajouter un horaire</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="{{ Route::currentRouteName() == 'bookings.index' || Route::currentRouteName() == 'bookings.create' ? 'active' : '' }}"
                       href="#"><span>Réservations</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a class="{{ Route::currentRouteName() == 'bookings.index' ? 'active' : '' }}"
                               href="{{ route('bookings.index') }}">Liste des réservations</a></li>
                        <li><a class="{{ Route::currentRouteName() == 'bookings.create' ? 'active' : '' }}"
                               href="{{ route('bookings.create') }}">Ajouter une réservation</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="{{ Route::currentRouteName() == 'pictures.index' || Route::currentRouteName() == 'pictures.create' ? 'active' : '' }}"
                       href="#"><span>Photos</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a class="{{ Route::currentRouteName() == 'pictures.index' ? 'active' : '' }}"
                               href="{{ route('pictures.index') }}">Liste des photos</a></li>
                        <li><a class="{{ Route::currentRouteName() == 'pictures.create' ? 'active' : '' }}"
                               href="{{ route('pictures.create') }}">Ajouter une photo</a></li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
