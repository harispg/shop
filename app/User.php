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

    /**
     * Checks if a user has Role
     * @param  [string]  $role 
     * @return boolean 
     */
    public function hasRole($role)
    {
        if(is_string($role)){
            return $this->roles->where('name', $role)->count();
        }

        return $role->intersect($this->roles)->count();
    }

    public function getRole()
    {
        return $this->roles()->first();
    }

    /**
     * Gives role to a user
     * @param  [string] $role
     * @return void
     */
    public function giveRole($role){
        if(!is_string($role)){abort(422,'Role must be a string');}
        if($this->hasRole($role)){abort(422, 'Already have this role');}
        $roleId = Role::where('name', $role)->first()->id;
        $this->roles()->attach($roleId);
    }

    /**
     * Takes away role from user
     * @param  [string] $role
     * @return void
     */
    public function takeAwayRole($role){
        if(!is_string($role)){abort(422,'Role must be a string');}
        if(!$this->hasRole($role)){abort(422, "User doesn't have this role");}
        $roleId = Role::where('name', $role)->first()->id;
        $this->roles()->detach($roleId);
    }

    
    public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\VerificationEmail);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Checks if user is Super Admin
     * @return boolean 
     */
    public function isSuper(){
        if($this->superAdmin){
            return true;
        }
        return false;
    }

}
