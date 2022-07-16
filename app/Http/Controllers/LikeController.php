<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request){
        $input = new Like;
        $input -> shop_id = $request->id;
        $input -> user_id = Auth::user()->id;
        $input -> save();

        return redirect()->route('index');
    }

    public function unlike(Request $request){
        $userID = Auth::id();
        $shopID = $request->id;
        $delete = Like::where('shop_id',$shopID)->where('user_id',$userID)->first();
        $delete -> delete();
        return redirect()->route('index');
    }
}