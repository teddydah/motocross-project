<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        Editer l'entrainement
    </h1>
    <form action="{{route('training.update', ['id' => $training->id])}}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="{{$training->name}}">
        <br>

        <label for="max_people">Nombre de personnes</label>
        <input type="number" name="max_people" id="max_people" value="{{$training->max_people}}">
        <br>

        <label for="type">Adulte ou enfant</label>
        <input type="radio" name="type" id="type" value="adulte" {{ $training->type == 'adulte' ? 'checked' : ''
        }}>Adulte</radio>
        <input type="radio" name="type" id="type" value="enfant" {{ $training->type == 'enfant' ? 'checked' : ''
        }}>Enfant</radio>
        <br>

        <label for="price">Prix</label>
        <input type="number" name="price" id="price" value="{{$training->price}}">
        <br>

        <label for="length">Longueur</label>
        <input type="number" name="length" id="length" value="{{$training->length}}">
        <br>

        <label for="width">Largeur</label>
        <input type="number" name="width" id="width" value="{{$training->width}}">
        <br>

        <label for="address">Adresse</label>
        <input type="text" name="address" id="address" value="{{$training->address}}">
        <br>

        <label for="zip_code">Code postal</label>
        <input type="text" name="zip_code" id="zip_code" value="{{$training->zip_code}}">
        <br>

        <label for="city">Ville</label>
        <input type="text" name="city" id="city" value="{{$training->city}}">
        <br>

        <label for="latitude">Latitude</label>
        <input type="number" name="latitude" id="latitude" value="{{$training->latitude}}">
        <br>

        <label for="longitude">Longitude</label>
        <input type="number" name="longitude" id="longitude" value="{{$training->longitude}}">
        <br>

        <button type="submit">Enregistrer</button>
</body>

</html>