@extends('layouts.main')

@section('title')
    Auribail Mx Park | Ajouter un entraînement
@endsection

@section('main')
    <section class="admin">
        @include('messages.errors')
        <div class="section-title container bg-white">
            <span>AJouter un entraînement</span>
            <h2 class="mb-0">Ajouter un entraînement</h2>
        </div>
        <form action="{{ route('trainings.store') }}" method="post">
            @csrf
            <table class="container table table-admin table-edit table-striped align-middle mb-0">
                <tbody>
                <tr>
                    <th scope="row"><label for="name">Nom :</label></th>
                    <td>
                        <input type="text" name="name" id="name" placeholder="Auribail mx track"
                               value="{{ old('name') }}" required autofocus>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="max_people">Nb max de pilotes inscrits :</label></th>
                    <td>
                        <input type="text" name="max_people" id="max_people" placeholder="15"
                               value="{{ old('max_people') }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="track">Piste :</label></th>
                    <td>
                        <input type="text" name="track" id="track" placeholder="MX" value="{{ old('track') }}"
                               required>
                    </td>
                </tr>

                <!-- TODO -->
                <tr>
                    <th scope="row"><label for="license_type">Type(s) de licence :</label></th>
                    <td>
                        <input type="text" name="license_type" id="license_type" placeholder="UFOLEP, FFM"
                               value="{{ old('license_type') }}">
                    </td>
                </tr>


                <tr>
                    <th scope="row"><label for="latitude">Latitude :</label></th>
                    <td>
                        <input type="text" name="latitude" id="latitude" value="{{ old('latitude') }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="longitude">Longitude :</label></th>
                    <td>
                        <input type="text" name="longitude" id="longitude"
                               value="{{ old('longitude') }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="phone">Téléphone :</label></th>
                    <td>
                        <input type="text" name="phone" id="phone" placeholder="0561507161" value="{{ old('phone') }}"
                               required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="email">E-mail :</label></th>
                    <td>
                        <input type="email" name="email" id="email" placeholder="daniel.raymond09@orange.fr"
                               value="{{ old('email') }}" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="social_network_link">Facebook :</label></th>
                    <td>
                        <input type="url" name="social_network_link"
                               placeholder="https://www.facebook.com/auribail.motosport/" id="social_network_link"
                               value="{{ old('social_network_link') }}">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="description">Description :</label></th>
                    <td>
                        <textarea class="align-middle" name="description" id="description"
                                  placeholder="Auribail Mx Park"
                                  rows="3">{{ old('description') }}</textarea>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-center" colspan="2">
                        <a class="btn btn-dark btn-outline-light btn-back ms-0 me-0"
                           href="{{ route('clubs.index') }}" title="Retour à la liste des clubs">Retour</a>
                        <button class="btn btn-primary btn-outline-light btn-add m-2" type="submit"
                                title="Ajouter un club">Ajouter
                        </button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </section>
@endsection




<body>
<h1>
    Créer l'entrainement
</h1>
<form action="{{ route('trainings.store') }}" method="POST">
    @csrf
    <label for="name">Nom</label>
    <input type="text" name="name" id="name" autofocus>
    <br>

    <label for="max_people">Nombre de personnes</label>
    <input type="number" name="max_people" id="max_people">
    <br>

    <label for="type">Adulte ou enfant</label>
    <input type="radio" name="type" id="type" value="adulte">Adulte</radio>
    <input type="radio" name="type" id="type" value="enfant">Enfant</radio>
    <br>

    <label for="price">Prix</label>
    <input type="number" name="price" id="price">
    <br>

    <label for="length">Longueur</label>
    <input type="number" name="length" id="length">
    <br>

    <label for="width">Largeur</label>
    <input type="number" name="width" id="width">
    <br>

    <label for="address">Adresse</label>
    <input type="text" name="address" id="address">
    <br>

    <label for="zip_code">Code postal</label>
    <input type="text" name="zip_code" id="zip_code">
    <br>

    <label for="city">Ville</label>
    <input type="text" name="city" id="city">
    <br>

    <label for="latitude">Latitude</label>
    <input type="number" name="latitude" id="latitude">
    <br>

    <label for="longitude">Longitude</label>
    <input type="number" name="longitude" id="longitude">
    <br>

    <button type="submit">Enregistrer</button>
</body>

</html>
