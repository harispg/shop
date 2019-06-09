<?php

namespace App;

use App\Traits\WorksWithRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use WorksWithRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];
    
    /**
     * this attribute tells model to append computed atributes
     * to json representation of models
     * @var array
     */
    protected $appends=['active_order_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   

    
    public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\VerificationEmail);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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


    public function getActiveOrderIdAttribute(){
         return $this->activeOrder() ? $this->activeOrder()->id : null;
    }


    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

   /* public function getLikedArticlesAttribute(){
        return $this->articles->pluck('id')->toArray();
    }*/
}
