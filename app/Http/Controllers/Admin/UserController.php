<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        $cnt   = 0;
        
        return view('admin.users.index', compact('users', 'cnt'));
    }
    
    public function edit(User $user)
    {  
        return view('admin.users.edit', compact('user'));
    }
}
