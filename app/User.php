<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if(is_string($role)){
            return $this->roles->where('name', $role)->count();
        }

        return $role->intersect($this->roles)->count();
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\VerificationEmail);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function isSupper(){
        if($this->superAdmin){
            return true;
        }
        return false;
    }

}
