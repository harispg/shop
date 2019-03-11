<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function store(Request $request, Article $article)
    {
    	$this->validate($request, [
    		'body' => 'required|min:5'
	    ]);
    	$comment = new Comment;

    	$comment->user_id = auth()->id();
    	$comment->parent_id = $request->parentId;
    	$comment->body = nl2br($request->body);
    	$article->saveComment($comment);
	    
	    return redirect(url()->previous().'#commentNo'.$comment->parent_id);
    }
}
