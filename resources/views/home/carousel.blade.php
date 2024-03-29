<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item slide-1 active">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <img class="mb-4 scrollto animate__animated animate__zoomIn"
                                 src="{{ url('/') }}/img/logo.png" alt="Logo Auribail Mx Park">
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item slide-2">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Bienvenue à <span>Auribail Mx Park</span>
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item slide-3">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <a href="{{ route('bookings.create') }}"
                               class="btn-get-started scrollto animate__animated animate__fadeInUp"
                               title="S'inscrire à un entraînement">S'inscrire à un entraînement</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon ri-arrow-left-line" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon ri-arrow-right-line" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</section>
