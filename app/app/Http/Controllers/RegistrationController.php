<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function eventform(){
        return view('eventform');
    }

    public function eventconfirm(Request $request){

        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'contents'  => 'required',
            'type' => 'required',
            'fee'  => 'required',
        ]);

        $details = $request->all();
        
        return view('eventconfirm',[
            'details'=>$details
        ]);
    }

    public function eventregister(){
        return view('eventregister');
    }

  
}
