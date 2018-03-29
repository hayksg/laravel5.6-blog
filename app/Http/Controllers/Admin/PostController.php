<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\PostTag;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cnt   = 0;
    	//$posts = Post::get();
    	$posts = Post::with('tags')->get();

    	return view('admin.posts.index', compact('posts', 'cnt'));
    }

    public function create()
    {
    	return view('admin.posts.create');
    }

    public function store()
    {
        $tags = request('tag');
        
        Tag::saveTag($tags);
        
    	$this->validate(request(), [
            'title'       => 'required|unique:posts,title',
            'content'     => 'required',          
            'description' => 'required',
    	]);

    	$title       = trim(htmlentities(request('title'), ENT_QUOTES));
    	$content     = trim(htmlentities(request('content'), ENT_QUOTES));
    	$description = trim(htmlentities(request('description'), ENT_QUOTES));

    	$post = new Post();
    	$post->user_id = auth()->id();
    	$post->title   = $title;
    	$post->description   = $description;
    	$post->content = $content;
        
        if (request()->hasFile('file')) {
            $filePath  = basename(request()->file->store('public/upload'));
            $post->img = $filePath;
        }

    	$res = $post->save();
        
        $tags = explode(' ', $tags);
        foreach ($tags as $tagName) {
            $tag = Tag::where('name', $tagName)->first();
            $post->tags()->attach($tag); 
        }
        
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
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $this->validate(request(), [
            'title'   => 'required',
            'content' => 'required',
        ]);

        $title   = trim(htmlentities(request('title'), ENT_QUOTES));
        $content = trim(htmlentities(request('content'), ENT_QUOTES));

        /*
        $post->title   = $title;
        $post->content = $content;
        $post->save();
        */

        $post->update([
            'user_id' => auth()->id(),
            'title'   => $title,
            'content' => $content
        ]);
        
        return redirect('admin/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('admin/posts');
    }
}
