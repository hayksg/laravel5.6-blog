<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Storage;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $cnt     = 0;
        $perPage = Storage::get('public/per-category-page/text.txt');
    	  $posts   = Post::where('is_visible', 'on')->with('tags')->where('category_id', $category->id)->paginate($perPage);

        if (! $this->isPaginationPageExistsInUrl($posts)) {
            return view('errors.404');
        }

    	  return view('categories.index', compact('posts', 'cnt'));
    }
}
