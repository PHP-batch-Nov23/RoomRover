<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelController extends Controller
{
    public function hotellist()
    {
        $hotels = Hotel::orderBy('id','desc')->paginate(8);
        return view('admin.hotels', compact('hotels'));
    }
//create hotel
    public function create()
    {
        return view('admin.newhotel');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:200',
            'city' => 'required|string|min:3|max:200',
            'address' => 'required|string|max:500',
            'rooms' => 'required|integer',
            'price' => 'required|integer',
        ]);

        Hotel::create([
            'name' => $request->name,
            'city' => $request->city,
            'address' => $request->address,
            'rooms' => $request->rooms,
            'price' => $request->price,
        ]);

        return redirect()->route('hotellist')->with('status', 'Hotel added successfully.');
    }

    public function updateview($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.edithotel', compact('hotel'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:200',
            'city' => 'required|string|min:3|max:200',
            'address' => 'required|string|max:500',
            'rooms' => 'required|integer',
            'price' => 'required|integer',
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->update([
            'name' => $request->name,
            'city' => $request->city,
            'address' => $request->address,
            'rooms' => $request->rooms,
            'price' => $request->rooms,
        ]);

        return redirect()->route('hotellist')->with('status', 'Hotel updated successfully.');
    }


    public function destroy($id)
    {
        $hotels = Hotel::findOrFail($id);
        $hotels->delete();
        return redirect()->back()->with('status', 'Hotel deleted successfully.');
    }
}
