<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes; 

class BookingController extends Controller
{
   //Bookings Crud Operations
    public function showbookings(){
        $bookings = Booking::all();
        return view('admin.bookingsnew', compact('bookings'));
    }
//cancel booking
    public function destroy($id){
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('status', 'Booking canceled successfully.');
    }

    //search functionality
    public function search(Request $request)
    {
        $search = $request->input('search');

        $bookings = Booking::whereHas('user', function ($query) use ($search) {
            $query->where('full_name', 'like', "%$search%");
        })->paginate(10);

        return view('admin.bookingsnew', compact('bookings'));
    }
}
 
