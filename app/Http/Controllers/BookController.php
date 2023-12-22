<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'checkIndate' => 'required|date',
            'checkOutdate' => 'required|date|after:checkIndate',
        ]);

        $room = Room::find($id);

        $checkInDate = Carbon::parse($request->checkIndate);
        $checkOutDate = Carbon::parse($request->checkOutdate);
        $duration = $checkOutDate->diffInDays($checkInDate);

        $totalAmount = $room->price * $duration;

        Book::create([
            // 'guest_id' => Auth::check() ? Auth::user()->id : null,
            'guest_id' => $request->guestId,
            'room_id' => $request->roomId,
            'duration' => $duration,
            'check_in_date' => $checkInDate,
            'check_out_date' => $checkOutDate,
            'total_amount' => $totalAmount,
        ]);
        return back();
    }

    // public function booking($id)
    public function booking()
    {
        // $books = Book::where('room_id', $id)->get();
        $books = Book::all();
        return view('admin.book.index', compact('books'));
    }
    // public function bookingStore(Request $request, $id)
    // {
    //     $room = Room::find($id);

    //     $room->update([
    //         'status' => 'occupied',
    //     ]);
    //     return redirect()->route('booking')->with('success', 'You have confirmed the booking!');
    // }
}
