<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $cnt   = 0;
        $perPage = 4;
    	$posts = Post::where('is_visible', 'on')->with('tags')->where('category_id', $category->id)->paginate($perPage);

    	return view('categories.index', compact('posts', 'cnt'));
    }
}
