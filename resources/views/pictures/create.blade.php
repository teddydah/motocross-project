<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        Ajouter une image
    </h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('pictures.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="image">Choisir une image</label>
            <input type="file" id="image" name="image">
            <br>
        </div>

        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description">
            <br>
        </div>

        <div>
            <label for="club_id" class="form-label">Clubs:</label>
            <select name="club_id" class="form-select" required>
                @foreach($clubs as $club)
                <option value="{{ $club->id }}">{{ $club->id }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Enregistrer</button>
</body>

</html>