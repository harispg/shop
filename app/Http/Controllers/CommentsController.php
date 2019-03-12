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
    	$comment->body = $request->body;

    	$article->saveComment($comment);

	    if(!$comment->parent_id){
        return redirect(url()->previous().'#commentNo'.$comment->id);
        }
	    return redirect(url()->previous().'#commentNo'.$comment->parent_id);
    }

    public function destroy(Comment $comment)
    {
        try{$comment->delete();}catch(Exception $e){
            return $e->message;
        }

        return 'Successfuly deleted a comment'; 

    }
}
