<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function users(){
        return $this -> belongsTo(User::class); 
    }

    public function events(){
        return $this -> belongsTo(Event::class); 
    }

//    後でViewで使う、いいねされているかを判定するメソッド。
    // public function isLikedBy($user): bool {
    //     return Like::where('user_id', $user->id)->where('event_id', $this->id)->first() !==null;
    // }

    public function like_exist($user_id, $event_id) {
        return Like::where('user_id', $user_id)->where('event_id', $event_id)->exists();
        }
        
        
        
}
