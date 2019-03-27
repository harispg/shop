<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $guarded = [];

    public function items()
    {
    	return $this->hasMany(OrderItem::class);
    }

    public function status()
    {
    	return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function addItem($item)
    {
    	$this->items()->save($item);
    }
}
