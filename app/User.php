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
        return $this->roles->first();
    }

    public function getRoleName()
    {
        if($this->roles->count()>0){
            return $this->getRole()->name;
        }else{
            return "no role";
        } 
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
        $this->roles()->sync($roleId);
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


    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function makeOrder()
    {
        return $this->orders()->create(['order_status_id'=>1]);
    }

    public function activeOrder()
    {   
        if(Order::with('items.article')->where([['user_id', $this->id], ['order_status_id',1]])->count() == 0)
        {
            return null;
        }
        return Order::with('items.article')->where([['user_id', $this->id], ['order_status_id',1]])->firstOrFail();
    }

    public function itemsOrdered()
    {
        if($this->activeOrder() != null)
        {
            return $this->activeOrder()->items->count();
        }
        return 0;
    }

}
