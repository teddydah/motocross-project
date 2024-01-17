<div class="container">
    <h2>Create Booking</h2>
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User:</label>
            <select name="user_id" class="form-select" required>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="schedule_id" class="form-label">Schedule:</label>
            <select name="schedule_id" class="form-select" required>
                @foreach($schedules as $schedule)
                <option value="{{ $schedule->id }}">{{ $schedule->id }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Booking</button>
    </form>
</div>