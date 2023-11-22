<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    public function users(){
        return $this -> belongsTo(User::class); 
    }

    public function events(){
        return $this -> belongsTo(Event::class); 
    }
}
