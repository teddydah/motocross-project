<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="firstname">Prénom</label>
            <input id="firstname" type="text" name="firstname" required autofocus>
        </div>

        <div>
            <label for="lastname">Nom de famille</label>
            <input id="lastname" type="text" name="lastname" required autofocus>
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required>
        </div>

        <label for="role">Role</label>
        <input type="radio" name="role" id="role" value="Admin">Admin</radio>
        <input type="radio" name="role" id="role" value="User">Utilisateur</radio>
        <br>

        <div>
            <label for="license_number">Numéro de license</label>
            <input id="license_number" type="number" name="license_number" required autofocus>
        </div>

        <div>
            <label for="phone">Numéro de téléphone</label>
            <input id="phone" type="number" name="phone" required autofocus>
        </div>

        <div>
            <label for="birth_date">Année de naissance</label>
            <input id="birth_date" type="date" name="birth_date" required autofocus>
        </div>

        <div>
            <label for="address">Adresse</label>
            <input id="address" type="text" name="address" required autofocus>
        </div>

        <div>
            <label for="zip_code">Code postal</label>
            <input id="zip_code" type="text" name="zip_code" required autofocus>
        </div>

        <div>
            <label for="city">Ville</label>
            <input id="city" type="text" name="city" required autofocus>
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
        </div>

        <div>
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <div>
            <button type="submit">S'inscrire</button>
        </div>
    </form>
</body>

</html>