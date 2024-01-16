@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Schedules
                        <a href="{{ route('schedules.create') }}" class="btn btn-primary float-end">Create Schedule</a>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="row">#</th>
                                <th scope="row">Training</th>
                                <th scope="row">Heure de début</th>
                                <th scope="row">Heure de fin</th>
                                <th scope="row">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->id }}</td>
                                    <td>{{ $schedule->training->name }}</td>
                                    <td>{{ $schedule->start_date }}</td>
                                    <td>{{ $schedule->end_date }}</td>
                                    <td>
                                        <a href="{{ route('schedules.edit', $schedule->id) }}"
                                           class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="post"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this schedule?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $schedules->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
