<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1>
                <a href="{{ url('/') }}"><img src="{{url('/')}}/img/motocross.png" alt="Logo" class="img-fluid"></a>
                <a href="{{ url('/') }}"><span>Auribail</span> <span>Mx Park</span></a>
            </h1>
        </div>
        <nav id="navbar" class="navbar">
            <!-- TODO: active -->
            <ul>
                <li class="dropdown"><a href="#"><span>Clubs</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('clubs.index') }}">Liste des clubs</a></li>
                        <li><a href="{{ route('clubs.create') }}">Ajouter un club</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Entraînements</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('trainings.index') }}">Liste des entraînements</a></li>
                        <li><a href="{{ route('trainings.create') }}">Ajouter un entraînement</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Horaires</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('schedules.index') }}">Liste des horaires</a></li>
                        <li><a href="{{ route('schedules.create') }}">Ajouter un horaire</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Réservations</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('bookings.index') }}">Liste des réservations</a></li>
                        <li><a href="{{ route('bookings.create') }}">Ajouter une réservation</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Photos</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('pictures.index') }}">Liste des photos</a></li>
                        <li><a href="{{ route('pictures.create') }}">Ajouter une photo</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{ route('posts.index') }}">Messages</a></li>
                <li><a class="nav-link scrollto" href="{{ route('users.index') }}">Utilisateurs</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
