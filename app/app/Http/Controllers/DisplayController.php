<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Event;



class DisplayController extends Controller
{
    // public function index(){
    //     $auths = Auth::user();
    //     return view('index',['auths'=> $auths]);
    // }

    public function index(){
        $events = new Event;
        $allevents = $events->all()->toArray();

        return view('index',
        ['events'=>$allevents]
        );
    }

    public function eventdetail($eventid){
        $events = new Event;
        $allevents = $events->where('id','=',$eventid)->get()->toArray();

        return view('eventdetail',
        ['events'=> $allevents,]);
    }

    public function userprofile(){

        //userの全情報を抽出
        Auth::user();

        //userのidをとってくるなら
        //Auth::id();

        // $users =  new User;
        // $user = $users->where('id','=',$userid)->get();

        return view('userprofile');
    }

}

