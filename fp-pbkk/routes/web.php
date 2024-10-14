<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/tourlist', function () {
    return view('tourlist');
});

Route::get('/bookings', function () {
    return view('bookings');
});