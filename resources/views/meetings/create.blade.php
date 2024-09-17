@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New Meeting</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Meeting Form -->
    <form action="{{ route('meetings.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="meeting_date" class="form-label">Meeting Date</label>
            <input type="date" name="meeting_date" id="meeting_date" class="form-control" value="{{ old('meeting_date') }}" required>
        </div>

        <button type="submit" class="btn custom-btn">Create Meeting</button>
    </form>
</div>
@endsection
