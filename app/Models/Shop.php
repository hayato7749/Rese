<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;
    
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('shop_id', $this->id)->first() !==null;
    }
}