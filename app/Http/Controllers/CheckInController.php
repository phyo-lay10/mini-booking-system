<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CheckIn;
use App\Models\CheckOut;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckInController extends Controller
{
    public function checkInPage()
    {
        $checkIns = CheckIn::all();
        return view('admin.checkIn.index', compact('checkIns'));
    }
    public function checkIn($id)
    {
        $book = Book::find($id);
        CheckIn::create([
            'book_id' => $id,
            'room_id' => $book->room_id,
            'check_in_date' => $book->check_in_date,
            'check_in_by_id' => Auth::user()->id,
        ]);

        $room = $book->room;

        $room->update([
            'status' => 'occupied',
        ]);
        $book->delete($id);
        return redirect()->route('checkInPage');
    }

    public function checkOutPage()
    {
        $checkOuts = CheckOut::all();
        return view('admin.checkOut.index', compact('checkOuts'));
    }

    public function checkOut($id)
    {
        $checkIn = CheckIn::where('book_id', $id)->first();
        CheckOut::create([
            'check_in_id' => $checkIn->id,
            'room_id' => $checkIn->room_id,
            'check_out_date' => now(),
        ]);
        $room = $checkIn->room;
        $room->update([
            'status' => 'available',
        ]);
        return redirect()->route('checkOutPage');
    }
}
