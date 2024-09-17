@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center">
                <i class="bi bi-check-circle me-2"></i> 
                <div>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <h1 class="mb-4">Directory Data</h1>

        <!-- Create Button -->
        <div class="mb-4">
            <a href="{{ route('meetings.create') }}" class="btn custom-btn">Create New Meeting</a>
        </div>

        <!-- List of Meetings -->
        @if($meetings->isEmpty())
            <div class="alert alert-info">
                No meetings available.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($meetings as $meeting)
                            <tr>
                                <td>{{ $meeting->title }}</td>
                                <td>{{ $meeting->description }}</td>
                                <td>{{ $meeting->meeting_date }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('meetings.edit', $meeting->id) }}" class="btn custom-edit-btn">Edit</a>
                                    
                                    <!-- Delete Form -->
                                   <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn custom-delete-btn">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

