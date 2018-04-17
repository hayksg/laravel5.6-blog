<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {       
        $posts = Post::has('comments')->get(); // gets only post which has comments
        $cnt = 0;
        
        return view('admin.comments.index', compact('posts', 'cnt'));
    }

    public function edit(Post $post)
    {
        /* When deleted last comment in post, redirect to comments index page */
        if (! $post->comments || count($post->comments) == 0) {
            return redirect('admin/comments');
        }
        /* End block */
        
        return view('admin.comments.edit', compact('post'));
    }
    
    public function update(Comment $comment)
    {
        $this->validate(request(), [          
            'content' => 'required|min:2|regex:/^[a-zA-Z !,\.-:;]+$/u',
    	]);
        
        $comment->content = request('content');
        $comment->update();
        
        session()->flash('message', 'Comment successfully edited!');
        return back();
    }
    
    public function delete(Comment $comment)
    { 
        $comment->delete();
        
        session()->flash('message', 'Comment successfully deleted!');
        return back();
    }
}
