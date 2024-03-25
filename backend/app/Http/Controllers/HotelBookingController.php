<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelBookingController extends Controller
{
    public function showbooking($user_id)
    {
        $bookings = Booking::where('user_id', $user_id)->get();
        if ($bookings->isEmpty()) {
            return response()->json(['message' => 'No bookings found for the specified user_id'], 404);
        }
        return response()->json($bookings, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'hotel_id' => 'required|integer',
            'customer_name' => 'required|string',
            'no_people' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'rooms_book' => 'required|integer',
        ]);

        // Find the hotel by ID
        $hotel = Hotel::findOrFail($validatedData['hotel_id']);

        // Ensure that the requested number of rooms is available
        if ($hotel->rooms >= $validatedData['rooms_book']) {

            $hotel->rooms -= $validatedData['rooms_book'];
            $hotel->save();


            $booking = Booking::create($validatedData);

            $response = [
                'message' => 'Booking created successfully!',
                'data' => $booking,
            ];
            return response()->json($response);
        } else {

            return response()->json(['message' => 'Requested rooms are not available'], 400);
        }
    }


    //soft delete booking=softDeleteBooking
    public function softDeleteBooking($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->delete(); // This will trigger soft deletion

        return response()->json([
            'message' => 'Booking Cancel successfully!',
        ]);
    }
}
