<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('meetings', MeetingController::class);