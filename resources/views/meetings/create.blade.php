<form action="{{ route('meetings.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <textarea name="description" placeholder="Description"></textarea>
    <input type="date" name="meeting_date">
    <button type="submit">Create Meeting</button>
</form>