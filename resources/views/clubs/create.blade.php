<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Club</title>
</head>
<body>
    <h1>Create Club</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clubs.store') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        <br>
        
        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ old('address') }}" required>
        <br>
        
        <label for="zip_code">Zip Code:</label>
        <input type="text" name="zip_code" value="{{ old('zip_code') }}" required>
        <br>
        
        <label for="city">City:</label>
        <input type="text" name="city" value="{{ old('city') }}" required>
        <br>
        
        <label for="latitude">Latitude:</label>
        <input type="text" name="latitude" value="{{ old('latitude') }}" required>
        <br>
        
        <label for="longitude">Longitude:</label>
        <input type="text" name="longitude" value="{{ old('longitude') }}" required>
        <br>
        
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ old('phone') }}" required>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <br>
        
        <label for="social_network_link">Social Network Link:</label>
        <input type="url" name="social_network_link" value="{{ old('social_network_link') }}">
        <br>
        
        <label for="description">Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>
        <br>

        <button type="submit">Create Club</button>
    </form>

    <br>

    <a href="{{ route('clubs.index') 
