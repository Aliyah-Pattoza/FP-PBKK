<?php

use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);  // API route to get all users
Route::get('/users/{id}', [UserController::class, 'show']);  // API route to get a user by ID
Route::post('/users', [UserController::class, 'store']);  // API route to create a user
Route::put('/users/{id}', [UserController::class, 'update']);  // API route to update a user
Route::delete('/users/{id}', [UserController::class, 'destroy']);  // API route to delete a user
