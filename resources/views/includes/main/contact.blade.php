<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <span>Contact</span>
            <h2>Contact</h2>
            <!--<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>-->
        </div>
    </div>

    <div class="map">
        <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="container">

        <div class="info-wrap mt-5">
            <div class="row">
                <div class="col-lg-4 info">
                    <i class="ri-map-pin-line"></i>
                    <h4>Adresse :</h4>
                    <p>Moto-Club Auribail<br>Mairie de Auribail<br>31190 Auribail</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                    <i class="ri-mail-line"></i>
                    <h4>E-mail :</h4>
                    <p>daniel.raymond09@orange.fr<br>sylvain.assie@gmail.com</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                    <i class="ri-phone-line"></i>
                    <h4>Téléphone :</h4>
                    <p>05 61 50 71 61<br>06 77 17 71 45</p>
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
