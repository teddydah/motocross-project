<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <span>Contact</span>
            <h2>Contact</h2>
            <!--<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>-->
        </div>
    </div>

    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d742855.1435220223!2d0.6976935232065575!3d43.33983634445177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aecfc42536a145%3A0xdde4829e36d4eed4!2sAuribail%20mx%20track!5e0!3m2!1sfr!2sfr!4v1705523055117!5m2!1sfr!2sfr"
            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="container">

        <div class="info-wrap mt-5">
            <div class="row">
                <div class="col-lg-3 info">
                    <i class="ri-map-pin-fill"></i>
                    <h4>Adresse</h4>
                    <p>Moto-Club Auribail<br>Mairie de Auribail<br>31190 Auribail</p>
                </div>

                <div class="col-lg-3 info mt-4 mt-lg-0">
                    <i class="ri-mail-fill"></i>
                    <h4>E-mail</h4>
                    <p>daniel.raymond09@orange.fr<br>sylvain.assie@gmail.com</p>
                </div>

                <div class="col-lg-3 info mt-4 mt-lg-0">
                    <i class="ri-phone-fill"></i>
                    <h4>Téléphone</h4>
                    <p>05 61 50 71 61<br>06 77 17 71 45</p>
                </div>

                <div class="col-lg-3 info mt-4 mt-lg-0">
                    <i class="ri-facebook-fill"></i>
                    <h4>Facebook</h4>
                    <p>
                        <a href="https://www.facebook.com/auribail.motosport/"
                           title="https://www.facebook.com/auribail.motosport/">Auribail Mx Park</a>
                    </p>
                </div>
            </div>
        </div>

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
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
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
            </div>
            <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message a bien été envoyé. Merci!</div>
            </div>
            <div class="text-center">
                <button class="button" type="submit">Envoyer</button>
            </div>
        </form>

    </div>
</section>
