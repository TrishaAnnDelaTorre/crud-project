<!-- resources/views/meetings/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Meeting</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Meeting Form -->
    <form action="{{ route('meetings.update', $meeting->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $meeting->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $meeting->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="meeting_date">Meeting Date</label>
            <input type="date" name="meeting_date" id="meeting_date" class="form-control" value="{{ old('meeting_date', $meeting->meeting_date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Meeting</button>
    </form>
</div>
@endsection
