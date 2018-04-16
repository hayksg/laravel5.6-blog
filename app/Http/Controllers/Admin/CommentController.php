<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class CommentController extends Controller
{
    public function index()
    {       
        
        $posts = Post::has('comments')->get(); // gets only post which has comments
        $cnt = 0;
        
        return view('admin.comments.index', compact('posts', 'cnt'));
    }
}
