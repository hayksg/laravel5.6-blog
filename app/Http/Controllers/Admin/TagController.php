<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;

class TagController extends Controller
{
    

    public function index()
    {
        $cnt  = 0;
        $tags = Tag::get();

    	return view('admin.tags.index', compact('tags', 'cnt'));
    }
    
    public function show(Tag $tag)
    {
        $cnt  = 0;
    	return view('admin.tags.show', compact('tag', 'cnt'));
    }

    public function create()
    {
    	return view('admin.tags.edit');
    }
    
    public function store()
    { 
        $this->validate(request(), [
            'name' => 'required|alpha_dash|max:255',
        ]);
        
        $name = trim(htmlentities(request('name')));
        
    	Tag::create([
            'name' => $name,
        ]);
        
        session()->flash('message', 'The tag successfully created!');

    	return redirect('/admin/tags');
    }
    
    public function edit(Tag $tag)
    {
    	return view('admin.tags.edit', compact('tag'));
    }
    
    public function update(Tag $tag)
    {
        $this->validate(request(), [
            'name' => 'required|max:255'
        ]);
        
        $tagName = trim(htmlentities(request('name'), ENT_QUOTES));
        $tag->name = $tagName;
        
        $tag->update();
        
        session()->flash('message', 'The tag successfully updated!');
    	return redirect('/admin/tags');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        $tag->posts()->detach();
        
        session()->flash('message', 'The tag successfully deleted!');
        return redirect('admin/tags');
    }
}
