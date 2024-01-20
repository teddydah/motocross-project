<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <span>Contact</span>
            <h2>Contact</h2>
            <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
        </div>
    </div>

    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d742855.1435220223!2d0.6976935232065575!3d43.33983634445177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aecfc42536a145%3A0xdde4829e36d4eed4!2sAuribail%20mx%20track!5e0!3m2!1sfr!2sfr!4v1705523055117!5m2!1sfr!2sfr"
            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="container">
        @foreach($clubs as $club)
            <div class="info-wrap mt-5">
                <div class="row">
                    <div class="col-lg-3 info">
                        <i class="ri-map-pin-fill"></i>
                        <h4>Adresse</h4>
                        <p>{{$club->name}}<br>{{$club->address}}<br>{{$club->zip_code}} {{$club->city}}</p>
                    </div>

                    <div class="col-lg-3 info mt-4 mt-lg-0">
                        <i class="ri-mail-fill"></i>
                        <h4>E-mail</h4>
                        <p>{{$club->email}}</p>
                    </div>

                    <div class="col-lg-3 info mt-4 mt-lg-0">
                        <i class="ri-phone-fill"></i>
                        <h4>Téléphone</h4>
                        <p>{{wordwrap($club->phone, 2, '.', 1)}}</p>
                    </div>

                    <div class="col-lg-3 info mt-4 mt-lg-0">
                        <i class="ri-facebook-fill"></i>
                        <h4>Facebook</h4>
                        <p>
                            <a href="{{$club->social_network_link}}"
                               title="{{$club->social_network_link}}">{{$club->description}}</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

        <form action="{{route('post.store')}}" method="post" role="form" class="php-email-form" id="form-contact">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email"
                           required>
                </div>
            </div>
            <div class="form-group mt-3">
                <select class="form-select rounded-0" name="subject" id="subject" required>
                    <option selected>-- Sélectionnez un motif --</option>
                    <option value="booking">Réservations</option>
                    <option value="training">Entraînements</option>
                    <option value="account">Gestion de votre compte</option>
                    <option value="info">Demande d'informations</option>
                    <option value="other">Autre demande</option>
                </select>
            </div>
            <div class="form-group mt-3 mb-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            @include('includes.alert')
            <div class="text-center">
                <button class="button fw-semibold" type="submit">Envoyer</button>
            </div>
        </form>
    </div>
</section>
