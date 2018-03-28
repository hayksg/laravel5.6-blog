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
    	/*
    	$posts = Post::latest();
    	
    	if ($month = request('month')) {
    		$posts->whereMonth('created_at', Carbon::parse($month)->month);
    	}

    	if ($year = request('year')) {
    		$posts->whereYear('created_at', $year);
    	}
    	
    	$posts = $posts->get();
    	*/

		//$posts = Post::latest()->filter(request()->only('month', 'year'))->get();
		//$posts = Post::latest()->filter(request(['month', 'year']))->get();
		$posts = Post::latest()->filter(request(['month', 'year']))->paginate(1)->appends(request()->query());
		//$posts = Post::latest()->filter(request()->only(['month', 'year']))->get();
		

		/*
    	$archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(id) published')
    	                ->groupBy('year', 'month')
    	                ->orderByRaw('min(created_at) asc')
    	                ->get();
    	*/

    	//$archives = Post::getArchives(); // moved to AppServiceProvider


    	//return view('index', compact('posts', 'archives'));
                
                //$value = session('key', 'default');
                //dd($value);
                
                //session(['message' => 'Thanks so much for signing up!']);
                //session()->flash('message', 'Thanks so much for signing up!');

    	return view('index', compact('posts'));
    }

    public function show(Post $post)
    {
    	return view('show', compact('post'));
    }
}
