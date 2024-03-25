<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');
    //agent approved
    Route::post('/admin/accept-request/{user}', [AuthController::class, 'acceptRequest'])->name('admin.accept-request');
    Route::post('/admin/reject-request/{user}', [AuthController::class, 'rejectRequest'])->name('admin.reject-request');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
   
    // User Component
    Route::get('/admin/user', [UserController::class, 'userlist'])->name('userlist');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::put('/user/{id}/enable', [UserController::class, 'enable'])->name('user.enable');
    Route::put('/user/{id}/disable', [UserController::class, 'disable'])->name('user.disable');

    // Hotel Component
    Route::get('/admin/hotels', [HotelController::class, 'hotellist'])->name('hotellist');
    Route::get('/newhotel', [HotelController::class, 'create'])->name('newhotel');
    Route::post('/hotel/store', [HotelController::class, 'store'])->name('hotel.store');
    Route::get('/hotel/{id}/edit', [HotelController::class, 'updateview'])->name('hotel.update');
    Route::put('/hotel/{id}', [HotelController::class, 'update'])->name('hotel_update');
    Route::delete('/hotel/{id}', [HotelController::class, 'destroy'])->name('hotel.destroy'); 

    //Booking Component 
    Route::get('/admin/bookingsnew', [BookingController::class, 'showbookings'])->name('bookingsnew');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
    Route::get('bookings', [BookingController::class, 'search'])->name('bookings.search');
});
