<?php

namespace App;

use App\Traits\WorksWithArticles;
use Illuminate\Database\Eloquent\Model;


class OrderItem extends Model
{	
	use WorksWithArticles;

	protected $guarded = [];
	protected $appends = ['name', 'price', 'photo', 'total'];

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

}
