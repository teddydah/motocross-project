@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Bookings</h2>
        <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Add Booking</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-light text-center">
            <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Utilisateur</th>
                <th scope="row">Créneaux</th>
                <th scope="row">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ date_format(date_create($booking->schedule->start_date), 'd/m/Y') }}
                        | de {{ date_format(date_create($booking->schedule->start_date), 'H:i') }}
                        à {{ date_format(date_create($booking->schedule->end_date), 'H:i') }}</td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
