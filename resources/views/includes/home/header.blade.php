<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1>
                <a href="{{ url('/') }}"><img src="{{url('/')}}/img/motocross.png" alt="Logo" class="img-fluid"></a>
                <a href="{{ url('/') }}"><span>Auribail</span> <span>Mx Park</span></a>
            </h1>
        </div>
        <nav id="navbar" class="navbar navbar-home">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ url('/') }}">Accueil</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
