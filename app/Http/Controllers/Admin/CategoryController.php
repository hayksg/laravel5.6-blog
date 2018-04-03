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
        $categories = Category::all();
    	
    	return view('admin.categories.index', compact('categories', 'cnt'));
    }
    
    public function create()
    {
        $categories = Category::get();
    	return view('admin.categories.create', compact('categories'));
    }
}
