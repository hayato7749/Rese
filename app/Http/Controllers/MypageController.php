<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        $userID = Auth::id();
        $shops = Shop::all();
        $reservations = Reservation::where('user_id',$userID)->get();
        $likes = Like::where('user_id',$userID)->get();
        return view('mypage',['auth'=>$auth,'shops'=>$shops,'reservations'=>$reservations,'likes'=>$likes]);
    }
}
