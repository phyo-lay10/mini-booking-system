<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomImageController;
use App\Http\Controllers\UiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('ui.home');
// });

// UI Panel
Route::get('/', [UiController::class, 'index'])->name('index');

// booking
Route::post('books/{id}/store', [BookController::class, 'store'])->name('books.store');

// Auth
// Register
Route::get('register', [AuthController::class, 'register'])->name('registerForm');
Route::post('register/store', [AuthController::class, 'registerStore'])->name('registerStore');

// Login
Route::get('login', [AuthController::class, 'login'])->name('loginForm');
Route::post('login', [AuthController::class, 'authenticate'])->name('loginStore');

// Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Admin Panel
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('index', [AdminController::class, 'index'])->name('dashboard');

    // category
    Route::resource('categories', CategoryController::class);

    //room
    Route::resource('rooms', RoomController::class);

    // booking
    // Route::get('bookings/{id}', [BookController::class, 'booking'])->name('booking');
    Route::get('bookings', [BookController::class, 'booking'])->name('booking');
    Route::post('bookings/{id}/store', [BookController::class, 'bookingStore'])->name('bookingStore');

    // check in/out
    Route::get('checkInPage', [CheckInController::class, 'checkInPage'])->name('checkInPage');
    Route::post('checkin/{id}', [CheckInController::class, 'checkIn'])->name('checkIn');
    Route::get('checkOutPage', [CheckInController::class, 'checkOutPage'])->name('checkOutPage');
    Route::post('checkout/{id}', [CheckInController::class, 'checkOut'])->name('checkOut');

    //room image
    // Route::resource('room-images', RoomImageController::class);
});
