<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $auth = Auth::user();
        $userID = Auth::id();
        $likes = Like::where('user_id',$userID)->get();
        return view('index',['shops'=>$shops,'auth'=>$auth,'likes'=>$likes]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'prefecture' => ['nullable'],
            'genre' => ['nullable'],
            'name' => ['string', 'max:191','nullable'],
        ]);
        $name = $request->input('name');
        $prefecture = $request->input('prefecture');
        $genre = $request->input('genre');
        $query = Shop::query();
        if(!empty($name)) {
            $query->where('name', 'LIKE', "%{$name}%");
        };
        if($prefecture == "東京都") {
            $query->where('prefecture','東京都');
        };
        if($prefecture == "大阪府") {
            $query->where('prefecture','大阪府');
        };
        if($prefecture == "福岡県") {
            $query->where('prefecture','福岡県');
        };
        if($genre == "寿司") {
            $query->where('genre','寿司');
        };
        if($genre == "焼肉") {
            $query->where('genre','焼肉');
        };
        if($genre == "居酒屋") {
            $query->where('genre','居酒屋');
        };
        if($genre == "イタリアン") {
            $query->where('genre','イタリアン');
        };
        $shops = $query->get();
        $userID = Auth::id();
        $auth = Auth::user();
        $likes = Like::where('user_id',$userID)->get();
        return view('index',compact('shops','auth', 'likes'));
    }

    public function detail(Request $request)
    {
        $param= ['id' => $request->id];
        $shops = Shop::find($param);
        return view('detail',['shops'=>$shops]);
    }
}
