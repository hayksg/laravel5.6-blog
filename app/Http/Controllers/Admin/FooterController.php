<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    public function index()
    {
        $content = Storage::get('public/footer/text.txt');
        
        return view('admin.footer.index', compact('content'));
    }
    
    public function store()
    {
        $messageStatus = 'message-error';
        $messageValue  = 'Can not update the footer data';
        
        $res = Storage::put('public/footer/text.txt', \Purifier::clean(request('data')));
        
        if ($res) {
            $messageStatus = 'message';
            $messageValue  = 'The data successfully updated';
        }
        
        session()->flash($messageStatus, $messageValue);
        return back();
    }
}
