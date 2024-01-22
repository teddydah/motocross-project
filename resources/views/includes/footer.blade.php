<?php $club = \App\Models\Club::find(1); ?>

<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex justify-content-center">
                        <div class="footer-info">
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

                <div class="col-md-4 footer-links">
                    <div class="d-flex justify-content-center">
                        <div class="footer-info">
                            <h4>Liens utiles</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Accueil</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">À propos</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 footer-links">
                    <div class="d-flex justify-content-center">
                        <div class="footer-info">
                            <h4>Our Services</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                            </ul>
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
