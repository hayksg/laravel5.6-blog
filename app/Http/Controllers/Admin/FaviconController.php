<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaviconController extends Controller
{
    public function index()
    {
        return view('admin.favicon.index');
    }

    public function store()
    {
        $this->validate(request(), [
            'favicon' => 'required|max:2000',
        ]);
        
        $messageStatus = 'message-error';
        $messageValue  = 'Can not chenge the favicon';
    
        if (request()->hasFile('favicon')) {
            \Storage::delete('public/favicon/favicon.ico');

            $img = basename(request('favicon')->getClientOriginalName(), 'ico');
            $ext = request('favicon')->getClientOriginalExtension();

            if ($img === 'favicon.' && $ext === 'ico') {
                $res = request('favicon')->storeAs('public/favicon', $img . $ext);
            
                if ($res) {
                    $messageStatus = 'message';
                    $messageValue  = 'The favicon changed';
                }
            }
        }
        
        session()->flash($messageStatus, $messageValue);
        return back();
    }
}
