<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex justify-content-center">
                        <div class="footer-info">
                            @php($club = \App\Models\Club::find(1))
                            <h3>{{$club->name}}</h3>
                            <p>
                                {{$club->address}} <br>
                                {{$club->zip_code}} {{$club->city}}<br><br>
                                <strong>Téléphone:</strong> {{wordwrap($club->phone, 2, '.', 1)}}<br>
                                <strong>Email:</strong> <a href="mailto:{{$club->email}}">{{$club->email}}</a><br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="{{$club->social_network_link}}" title="{{$club->social_network_link}}"
                                   class="facebook"><i
                                        class="bx bxl-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="links">
                    <div class="col-md-4 footer-links">
                        <div class="d-flex justify-content-center">
                            <div class="footer-info">
                                <h4>Menu</h4>
                                <ul>
                                    <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Accueil</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/#about') }}">À propos</a>
                                    </li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/#circuit') }}">Circuit</a>
                                    </li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/#pictures') }}">Photos</a>
                                    </li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/#contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 footer-links">
                        <div class="d-flex justify-content-center">
                            <div class="footer-info">
                                <h4>Liens utiles</h4>
                                <ul>
                                    @if(Auth::check())
                                        <li><i class="bx bx-chevron-right"></i> <a
                                                href="{{ route('users.show', ['user' => Auth::user()->id]) }}"
                                                title="Voir mon profil">{{ Auth::user()->email }}</a></li>
                                        <li><i class="bx bx-chevron-right"></i> <a
                                                href="{{ route('users.edit', ['user' => Auth::user()->id]) }}"
                                                title="Modifier mon profil">Modifier mon
                                                profil</a></li>
                                        <li><i class="bx bx-chevron-right"></i> <a
                                                href="{{ url("/logout") }}" title="Se déconnecter">Se déconnecter</a>
                                        </li>
                                    @else
                                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/login') }}"
                                                                                   title="Se connecter">Se
                                                connecter</a>
                                        </li>
                                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/register') }}"
                                                                                   title="Créer un compte">Créer un
                                                compte</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright {{date('Y')}} <strong>{{$club->description}}</strong>. Tous les droits sont réservés
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/-->
            Designed by <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
        </div>
    </div>
</footer>
