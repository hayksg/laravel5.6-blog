<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use App\PostTag;
use Storage;

class PostController extends Controller
{
    public function index()
    {
        $cnt   = 0;
    	$posts = Post::with('tags')->get();

    	return view('admin.posts.index', compact('posts', 'cnt'));
    }

    public function create()
    {
        // In this 2 lines we are looking categories which do not have parents
        $val = Category::whereNotNull('parent_id')->pluck('parent_id');
        $categories = Category::select()->whereNotIn('id', $val)->get();

        $tags = Tag::get();
    	return view('admin.posts.create', compact('tags', 'categories'));
    }

    public function store()
    {     
    	$this->validate(request(), [
            'title'       => 'required|regex:/^[^<>]+$/u|unique:posts,title|max:255',
            'content'     => 'required',          
            'category'    => 'required|alpha_dash|max:255',          
            'description' => 'required|regex:/^[^<>]+$/u',
            'img'         => 'image|max:10000',
            'tags'        => 'array',
            'is_visible'  => 'in:null,on',
    	]);

    	$post = new Post();
    	$post->user_id     = auth()->id();
    	$post->title       = request('title');
    	$post->content     = request('content');
    	$post->category_id = request('category');
        $post->description = request('description');
        $post->is_visible  = request('is_visible');
        
        
        
        if (request()->hasFile('img')) {
            $filePath  = basename(request('img')->store('public/upload'));
            $post->img = $filePath;
        }
        
    	$post->save();
    	$post->tags()->sync(request('tags'), false); // false for saving, true for updating
        
        
        /*
        Post::create([
            'user_id' => auth()->id(),
            'title'   => $title,
            'content' => $content
        ]);
        */

        //auth()->user()->publish(new Post(request(['title', 'content'])));
        
        session()->flash('message', 'The post successfully created!');

    	return redirect('/admin/posts');
    }

    public function edit(Post $post)
    {
        $val = Category::whereNotNull('parent_id')->pluck('parent_id');
        $categories = Category::select()->whereNotIn('id', $val)->get();
        
        $allTags = Tag::pluck('name', 'id');

        return view('admin.posts.edit', compact('post', 'allTags', 'categories'));
    }

    public function update(Post $post)
    {  
        $this->validate(request(), [
            'title'       => 'required|regex:/^[^<>]+$/u|max:255|unique:posts,title,' . $post->id,
            'content'     => 'required',          
            'description' => 'required',
            'category_id' => 'alpha_dash|max:255', 
            'img'         => 'image|max:10000',
            'tags'        => 'array',
            'is_visible'  => 'in:null,on',
    	]);

        if (request()->hasFile('img')) {
            Post::deleteImage($post->img);

            $filePath  = basename(request('img')->store('public/upload'));
            $post->img = $filePath;
        }

    	$post->user_id     = auth()->id();
    	$post->title       = request('title');
    	$post->description = request('description');
        $post->content     = request('content');
    	$post->category_id    = request('category');
    	$post->is_visible  = request('is_visible');
        
        if (request()->hasFile('img')) {
            Storage::delete('public/upload/' . $post->img);
            
            $filePath  = basename(request('img')->store('public/upload'));
            $post->img = $filePath;
        }

    	$post->update();
        $post->tags()->sync(request('tags'), true); // false for saving, true for updating

        session()->flash('message', 'The post successfully updated!');
        return redirect('admin/posts');
    }

    public function destroy(Post $post)
    {       
        $post->delete();
        $post->tags()->detach();
        
        Post::deleteImage($post->img);
        
        session()->flash('message', 'The post successfully deleted!');
        return redirect('admin/posts');
    }
}
