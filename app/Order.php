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

    /*public function addItem($item)
    {
    	$this->items()->save($item);
    }*/

    public function getItem($article)
    {
        return $this->items->where('article_id', $article->id)->first();
    }


    public function subTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total+= $item->quantity*$item->article->price;
        }
        return  round($total,2);
    }

    public function orderTotal()
    {   
        if($this->discount === 0){
            return $this->subTotal();
        }
        $result = $this->subTotal() - $this->subTotal()*(1/$this->discount);
        return round($result, 2);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Adds article to the order
     * @param [App\Article] $article  [article which needs to be added]
     * @param [integer] $quantity [quantity which is added to existing quantity of item of the article]
     */
    public function addArticle($article, $quantity=null)
    {

        if ($this->itemOfArticle($article) == null){

            $this->items()->create(
                [
                    'order_id' => $this->id,
                    'article_id' => $article->id,
                    'quantity' => $quantity ?? 1,
                ]
            );
        }else{
            $item = $this->itemOfArticle($article);
            $quantity ? $item->quantity=$quantity : $item->quantity += 1;
            $item->save();
        }
    }
    /**
     * Finds item that belongs to specific article
     * @param  [App\Article] $article 
     * @return [null or App\Artilce object] 
     */
    public function itemOfArticle($article)
    {
        $items = $this->items()->with('article')->get();
        return $items->where('article.id', $article->id)->first();
    }
}
