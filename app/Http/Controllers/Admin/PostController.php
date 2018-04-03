<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use App\PostTag;

class PostController extends Controller
{
    

    public function index()
    {
        $cnt   = 0;
    	//$posts = Post::get();
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
            'title'       => 'required|unique:posts,title|max:255',
            'content'     => 'required',          
            'category'    => 'required|alpha_dash',          
            'description' => 'required|regex:/^[^<>]+$/u',
            'file'        => 'required|image|max:10000',
            'tags'        => 'array|alpha_dash',
            'is_visible'  => 'in:0,1',
    	]);

    	$post = new Post();
    	$post->user_id     = auth()->id();
    	$post->title       = request('title');
    	$post->content     = request('content');
    	$post->category_id = request('category');
        $post->description = request('description');
        $post->is_visible  = request('is_visible');
        
        if (request()->hasFile('file')) {
            $filePath  = basename(request()->file->store('public/upload'));
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
        $allTags = Tag::pluck('name', 'id');

        return view('admin.posts.edit', compact('post', 'allTags'));
    }

    public function update(Post $post)
    {
        $this->validate(request(), [
            'title'       => 'required|unique:posts,title,' . $post->id,
            'content'     => 'required',          
            'description' => 'required',
    	]);
        
        if (request('file')) {
            $this->validate(request(), [          
                'file' => 'image|max:10000',
    	    ]);
        }

    	$title       = trim(htmlentities(request('title'), ENT_QUOTES));
    	$content     = trim(htmlentities(request('content'), ENT_QUOTES));
    	$description = trim(htmlentities(request('description'), ENT_QUOTES));

    	$post->user_id = auth()->id();
    	$post->title   = $title;
    	$post->description   = $description;
    	$post->content = $content;
        
        if (request()->hasFile('file')) {
            $filePath  = basename(request()->file->store('public/upload'));
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

        return redirect('admin/posts');
    }
}
