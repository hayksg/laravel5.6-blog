<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function store(Post $post)
    {
    	$this->validate(request(), [
    		'user_id' => 'integer',
    		'post_id' => 'integer',
    		'content' => 'required|min:2',
    	]);

    	$content = trim(htmlentities(request('content')));

		/*
    	$comment = new Comment();
    	$comment->user_id = auth()->id();
    	$comment->post_id = $post->id;
    	$comment->content = $content;
    	$comment->save();
    	*/

		/*
    	Comment::create([
    		'user_id' => auth()->id(),
    		'post_id' => $post->id,
    		'content' => $content,
    	]);
    	*/

    	$post->addComment(auth()->id(), $content);

    	return back();
    }
}
