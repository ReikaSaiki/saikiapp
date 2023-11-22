<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function users(){
        return $this -> belongsTo(User::class); 
    }

    public function likes(){
        return $this -> hasMany(Like::class);
    }

    public function violations(){
        return $this -> hasMany(Violation::class);
    }
}
