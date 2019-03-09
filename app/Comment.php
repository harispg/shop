<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded = [];
	
    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function article()
    {
    	return $this->belognsTo(Article::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
