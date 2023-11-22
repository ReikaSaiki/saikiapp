<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model{

    public function events(){
        return $this -> hasMany(Event::class);
    }

    public function likes(){
        return $this -> hasMany(Like::class);
    }

    public function violations(){
        return $this -> hasMany(Violation::class);
    }
}

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}