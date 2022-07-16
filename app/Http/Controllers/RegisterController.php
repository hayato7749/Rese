<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
  public function index()
    {
        return view('register');
    }

    public function register(Request $request){

    $this->validate($request,[
    'name' => 'required',
    'email' => 'email|required|unique:users',
    'password' => 'required|min:8',
    ]);
    
    $user = new User([
    'name' => $request->input('name'),
    'email' => $request->input('email'),
    'password' => $request->input('password'),
    ]);
    
    $user->save();
    
    return view('thanks');
}
}
