<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        $perPage = 4;
        $posts = $tag->posts()->latest()->paginate($perPage);

        return view('index', compact('posts'));
    }
}
