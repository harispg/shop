<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiOrdersController extends Controller
{
    public function addArticle(Request $request, Order $order, Article $article)
    {
    	$order->addArticle($article, $request->quantity);

    	return $order->items()->with('article.photos')->get();
    }
}
