<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SocIconController extends Controller
{
    public function index()
    {       
        $github   = Storage::get('public/soc-icons/github.txt');
        $twitter  = Storage::get('public/soc-icons/twitter.txt');
        $facebook = Storage::get('public/soc-icons/facebook.txt');
        
        return view('admin.soc-icons.index', compact('github', 'twitter', 'facebook'));
    }
    
    public function store()
    {
        $messageStatus = 'message-error';
        $messageValue  = 'Can not update the footer data';
        
        $githubResult   = Storage::put('public/soc-icons/github.txt',   \Purifier::clean(request('github')));
        $twitterResult  = Storage::put('public/soc-icons/twitter.txt',  \Purifier::clean(request('twitter')));
        $facebookResult = Storage::put('public/soc-icons/facebook.txt', \Purifier::clean(request('facebook')));
        
        if ($githubResult && $twitterResult && $facebookResult) {
            $messageStatus = 'message';
            $messageValue  = 'The data successfully updated';
        }
        
        session()->flash($messageStatus, $messageValue);
        return back();
    }
}
