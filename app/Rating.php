<?php

namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
	protected $guarded = [];
	protected $hidden = ['id', 'created_at', 'updated_at'];

}
