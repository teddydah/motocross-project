@extends('layouts.main')

@section('title')
    Auribail Mx Park | {{$club->name}}
@endsection

@section('main')

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clubs.update', $club->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name', $club->name) }}" required>
        <br>

        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ old('address', $club->address) }}" required>
        <br>

        <label for="zip_code">Zip Code:</label>
        <input type="text" name="zip_code" value="{{ old('zip_code', $club->zip_code) }}" required>
        <br>

        <label for="city">City:</label>
        <input type="text" name="city" value="{{ old('city', $club->city) }}" required>
        <br>

        <label for="latitude">Latitude:</label>
        <input type="text" name="latitude" value="{{ old('latitude', $club->latitude) }}" required>
        <br>

        <label for="longitude">Longitude:</label>
        <input type="text" name="longitude" value="{{ old('longitude', $club->longitude) }}" required>
        <br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ old('phone', $club->phone) }}" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $club->email) }}" required>
        <br>

        <label for="social_network_link">Social Network Link:</label>
        <input type="url" name="social_network_link"
               value="{{ old('social_network_link', $club->social_network_link) }}">
        <br>

        <label for="description">Description:</label>
        <textarea name="description">{{ old('description', $club->description) }}</textarea>
        <br>

        <button type="submit">Update Club</button>
    </form>

    <br>

    <a href="{{ route('clubs.index') }}">Back to Clubs List</a>
@endsection
