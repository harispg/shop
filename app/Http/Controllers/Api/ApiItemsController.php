<?php

namespace App\Http\Controllers\Api;

use App\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiItemsController extends Controller
{
    public function add(Request $request)
    {
    	$this->validate($request, [
    		'item' => 'numeric',
    		'quantity' => 'numeric',
    	]);

    	$item = OrderItem::find($request->item);

    	$item->quantity = $request->quantity;
    	$item->save();

    	return $item->quantity;
    }

    public function destroy(OrderItem $item){
        $item->delete();
        return 'success';
    }
}
