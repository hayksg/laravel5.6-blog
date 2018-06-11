<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Storage;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
    	$perPage = Storage::get('public/per-tag-page/text.txt');
        $posts = $tag->posts()->latest()->paginate($perPage);
        
        return view('index', compact('posts'));
    }

    public function perTagPage()
    {
        $this->validate(request(), [
            'per-tag-page' => 'required|integer'
        ]);

        Storage::put('public/per-tag-page/text.txt', request('per-tag-page'));

        return back();
    }
}
