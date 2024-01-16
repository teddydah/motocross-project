@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if(isset($schedule))
                            Edit Schedule
                        @else
                            Create Schedule
                        @endif
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form
                            action="{{ isset($schedule) ? route('schedules.update', $schedule->id) : route('schedules.store') }}"
                            method="post">
                            @csrf
                            @if(isset($schedule))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="training_id" class="form-label">Training ID:</label>
                                <input type="text" class="form-control" id="training_id" name="training_id"
                                       value="{{ old('training_id', isset($schedule) ? $schedule->training_id : '') }}"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date:</label>
                                <input type="datetime-local" class="form-control" id="start_date" name="start_date"
                                       value="{{ old('start_date', isset($schedule) ? date('Y-m-d\TH:i', strtotime($schedule->start_date)) : '') }}"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date:</label>
                                <input type="datetime-local" class="form-control" id="end_date" name="end_date"
                                       value="{{ old('end_date', isset($schedule) ? date('Y-m-d\TH:i', strtotime($schedule->end_date)) : '') }}"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
