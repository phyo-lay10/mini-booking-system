<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class UiController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('ui.home', compact('rooms'));
    }
}
