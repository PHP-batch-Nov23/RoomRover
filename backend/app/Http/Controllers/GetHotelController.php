<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class GetHotelController extends Controller
{
    public function showHotel()
    {
        $hotels = Hotel::all();
        return response()->json($hotels);
    }
    public function saveHotel(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'rooms' => 'required|integer',

        ]);
       

        $booking = Hotel::create($validatedData);

        return response()->json([
            'message' => 'Hotel created successfully!',
            'data' => $booking,
        ], 201);
    }

    public function getHotelByName($name)
    {
        $hotel = Hotel::where('name', $name)->first();

        if ($hotel) {
            return response()->json($hotel);
        } else {
            return response()->json(['message' => 'Hotel not found!'], 404);
        }
    }
    public function getHotelByCity($city)
    {
        $hotel = Hotel::where('city', $city)->first();

        if ($hotel) {
            return response()->json($hotel);
        } else {
            return response()->json(['message' => 'Hotel not found!'], 404);
        }
    }
    public function getHotelByAddress($address)
    {
        $hotel = Hotel::where('address', $address)->first();

        if ($hotel) {
            return response()->json($hotel);
        } else {
            return response()->json(['message' => 'Hotel not found!'], 404);
        }
    }
}
