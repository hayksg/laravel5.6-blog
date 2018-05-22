<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {       
    	
        $perPage = 4;
		$posts = Post::where('is_visible', 'on')->latest()
                                                ->filter(request(['month', 'year']))
                                                ->paginate($perPage)
                                                ->appends(request()->query());
		

    	return view('index', compact('posts'));
    }

    public function show(Post $post)
    {
    	return view('show', compact('post'));
    }

    public function search()
    {
        return view('search');
    }

    public function searchResults()
    {
        $query = request('name');

        if ($query) {
            $search = "%" . request('name') . "%";
            $posts = Post::where('title', 'like', $search)->get();

            return $posts;
        }
        return '';
    }
}
