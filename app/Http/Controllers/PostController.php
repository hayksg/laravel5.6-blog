<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Carbon\Carbon;
use Storage;

class PostController extends Controller
{
    public function index()
    {       
        $perPage = Storage::get('public/per-page/text.txt');
		$posts = Post::where('is_visible', 'on')->latest()
                                                ->filter(request(['month', 'year']))
                                                ->paginate($perPage)
                                                ->appends(request()->query());

        if (! $this->isPaginationPageExistsInUrl($posts)) {
            return view('errors.404');
        }
		
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
        $query = trim(request('name'));

        if (! empty($query)) {
            $search = "%" . request('name') . "%";
            $posts = Post::where('title', 'like', $search)->get();

            return $posts;
        }
        return '';
    }
}
