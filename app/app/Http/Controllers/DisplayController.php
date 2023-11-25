<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class DisplayController extends Controller
{
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

        return view('eventdetail',[
            'events'=> $allevents,
        ]);
    }

}

