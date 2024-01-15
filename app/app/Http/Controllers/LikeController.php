<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Event;
use App\Like;
use App\User;

class LikeController extends Controller
{
//     public function like_events(){
//     $user = Auth::user();
//     $likes = $user->like_events()->get()->toArray();

//    dd($likes[0]['name']);

//     return view('userprofile',
//     ['likes'=>$likes]
//     );

//     } 
}
