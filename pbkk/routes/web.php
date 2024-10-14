<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ["title"=>"Home"]);
});

Route::get('/home', function () {
    return view('home');
});

Route::resource('/cities', \App\Http\Controllers\CitiesController::class);

Route::resource('/vehicles', \App\Http\Controllers\VehicleController::class);

Route::resource('/packages', App\Http\Controllers\PackageController::class);

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate']);
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');