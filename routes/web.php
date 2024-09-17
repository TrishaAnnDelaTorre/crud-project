<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;

Route::get('/', function () {
    return redirect()->route('meetings.index');
});

Route::resource('meetings', MeetingController::class);
Route::get('/api/meetings', [MeetingController::class, 'apiIndex']);
Route::get('/api/meetings/raw', [MeetingController::class, 'apiIndexRaw']);

Route::delete('/meetings/{id}', [MeetingController::class, 'destroy'])->name('meetings.destroy');