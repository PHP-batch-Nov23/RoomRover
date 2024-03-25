<?php

use App\Http\Controllers\GetHotelController;
use App\Http\Controllers\HotelBookingController;
use App\Http\Controllers\RegisterAgentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterAgentController::class, 'register']);
Route::post('login', [RegisterAgentController::class, 'login']);


//hotel booking API

//changed the name from test to bookings
Route::controller(HotelBookingController::class)->group(function(){
    Route::post('bookings', [HotelBookingController::class, 'store']);
});




//get and post hotels for search
Route::get('hotels', [GetHotelController::class, 'showHotel']);
Route::post('hotels', [GetHotelController::class, 'saveHotel']);
Route::get('hotels/{name}', [GetHotelController::class, 'getHotelByName']);
Route::get('hotelsCity/{city}', [GetHotelController::class, 'getHotelByCity']);
Route::get('hotelsAddress/{address}', [GetHotelController::class, 'getHotelByAddress']);


Route::get('bookings/{user_id}', [HotelBookingController::class, 'showbooking']);
Route::delete('bookings/{bookingId}', [HotelBookingController::class, 'softDeleteBooking']);
Route::get('bookings/{bookingId}', [HotelBookingController::class, 'getBookingById']); // Add a route for getting a booking by ID


