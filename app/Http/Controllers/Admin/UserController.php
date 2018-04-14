<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '<>', 'superadmin')->get();
        $cnt   = 0;
        
        return view('admin.users.index', compact('users', 'cnt'));
    }
    
    public function edit(User $user)
    {  
        return view('admin.users.edit', compact('user'));
    }
    
    public function update(User $user)
    { 
        $this->validate(request(), [
            'role' => 'required|in:admin,user'
        ]);
        
        $user->role = request('role');
        $user->update();
        
        session()->flash('message', 'The role is updated!');
        return redirect('admin/users');
    }
    
    public function destroy(User $user)
    { 
        $user->delete();
        
        session()->flash('message', 'User successfully deleted!');
        return back();
    }
}
