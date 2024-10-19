<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardReservationController;
use App\Http\Controllers\DashboardMenuController;

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate']);
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/menu', [DashboardMenuController::class, 'index'])->name('dashboard.menu.index');
    Route::get('/dashboard/menu/create', [DashboardMenuController::class, 'create'])->name('dashboard.menu.create');
    Route::post('/dashboard/menu', [DashboardMenuController::class, 'store'])->name('dashboard.menu.store');
    Route::get('/dashboard/menu/{menu}/edit', [DashboardMenuController::class, 'edit'])->name('dashboard.menu.edit');
    Route::put('/dashboard/menu/{menu}', [DashboardMenuController::class, 'update'])->name('dashboard.menu.update');
    Route::delete('/dashboard/menu/{menu}', [DashboardMenuController::class, 'destroy'])->name('dashboard.menu.destroy');
});

// Route untuk halaman reservasi di website utama
Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

// Route untuk manajemen reservasi di dashboard (hanya untuk admin/staff)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/reservations', [DashboardReservationController::class, 'index'])->name('dashboard.reservations.index');
    Route::get('/dashboard/reservations/{reservation}/edit', [DashboardReservationController::class, 'edit'])->name('dashboard.reservations.edit');
    Route::put('/dashboard/reservations/{reservation}', [DashboardReservationController::class, 'update'])->name('dashboard.reservations.update');
    Route::delete('/dashboard/reservations/{reservation}', [DashboardReservationController::class, 'destroy'])->name('dashboard.reservations.destroy');
});

use App\Http\Controllers\OrderController;

Route::get('/dashboard/orders', [OrderController::class, 'showOrders'])->name('dashboard.orders.order');

