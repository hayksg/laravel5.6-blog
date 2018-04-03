<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $cnt   = 0;
    	

    	//return view('admin.categories.index', compact('posts', 'cnt'));
    }
}
