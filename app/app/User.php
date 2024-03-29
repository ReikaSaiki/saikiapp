<?php
namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_image'
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

    // namespace App;


    public function events(){
        return $this -> hasMany(Event::class);
    }

    public function likes(){
        return $this -> hasMany(Like::class);
    }

    public function violations(){
        return $this -> hasMany(Violation::class);
    }

    public function like_events(){
    return $this->belongsToMany(Event::class, 'likes', 'user_id', 'event_id');
    }
}
