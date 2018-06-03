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
        $categories = Category::orderBy('category_order', 'asc')->get();
    	
    	return view('admin.categories.index', compact('categories', 'cnt'));
    }
    
    public function create()
    {
        $categories = Category::get();
    	return view('admin.categories.create', compact('categories'));
    }
    
    public function store()
    {
        $this->validate(request(), [
            'parent_id'      => 'integer',
            'name'           => 'required|regex:/^[^<>]+$/u|unique:categories,name|max:255',
            'is_visible'     => 'in:null,on',
            'category_order' => 'required|integer|max:255',
        ]);
        
        Category::create([
            'parent_id'      => request('parent_id') ?: null,
            'name'           => request('name'),
            'is_visible'     => request('is_visible'),
            'category_order' => request('category_order'),
        ]);
        
    	session()->flash('message', 'The category successfully created!');
    	return redirect('/admin/categories');
    }
    
    public function edit(Category $category)
    {
        $categories = Category::get();
    	return view('admin.categories.edit', compact('categories', 'category'));
    }
    
    public function update(Category $category)
    {
        $this->validate(request(), [
            'parent_id'      => 'integer',
            'name'           => 'required|regex:/^[^<>]+$/u|max:255|unique:categories,name,' . $category->id,
            'is_visible'     => 'in:null,on',
            'category_order' => 'required|integer|max:255',
        ]);
        
        $category->update([
            'parent_id'      => request('parent_id') ?: null,
            'name'           => request('name'),
            'is_visible'     => request('is_visible'),
            'category_order' => request('category_order'),
        ]);
        
        session()->flash('message', 'The category successfully updated!');
    	return redirect('/admin/categories');
    }
    
    public function destroy(Category $category)
    {
        $category->deletePostsImages();
        $category->delete();
        
        session()->flash('message', 'The category successfully deleted!');
    	return back();
    }
}
