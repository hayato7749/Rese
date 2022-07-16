<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reservation(Request $request)
    {
        $input = new Reservation;
        $input -> shop_id = $request->id;
        $input -> user_id = Auth::user()->id;
        $input -> date = $request->date;
        $input -> time = $request->time;
        $input -> number = $request->number;
        $input -> save();
        return view('complete');
    }
    
    public function delete($id)
    {
        $delete = Reservation::find($id);
        $delete -> delete();
        return redirect()->route('mypage');
    }
}
