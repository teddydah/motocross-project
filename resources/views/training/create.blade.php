<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        Créer l'entrainement
    </h1>
    <form action="{{route('training.store')}}" method="POST">
        @csrf
        <label for="name">Nom</label>
        <input type="text" name="name" id="name">
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