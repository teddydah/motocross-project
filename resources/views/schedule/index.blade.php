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
                                <th scope="row">Horaires</th>
                                <th scope="row">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedule as $schedules)
                            <tr>
                                <td>{{ $schedules->training_id }}</td>
                                <td>{{ $schedules->training->name }}</td>
                                <td>{{ date_format(date_create($schedules->start_date), 'd/m/Y') }}
                                    de {{ date_format(date_create($schedules->start_date), 'H:i') }}
                                    à {{ date_format(date_create($schedules->end_date), 'H:i') }}</td>
                                <td>
                                    <a href="{{ route('schedules.edit', $schedules->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('schedules.destroy', $schedules->id) }}" method="post"
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection