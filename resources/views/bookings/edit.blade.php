@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Edit Booking</h2>
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="user_id" class="form-label">User:</label>
                <select name="user_id" class="form-select" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ ($booking->user_id == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="schedule_id" class="form-label">Schedule:</label>
                <select name="schedule_id" class="form-select" required>
                    @foreach($schedules as $schedule)
                        <option value="{{ $schedule->id }}" {{ ($booking->schedule_id == $schedule->id) ? 'selected' : '' }}>{{ $schedule->id }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Booking</button>
        </form>
    </div>
@endsection
