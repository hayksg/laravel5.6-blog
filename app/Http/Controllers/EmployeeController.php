<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees     = Employee::all();
        $firstEmployee = Employee::first();
        
        return view('about-us', compact('employees', 'firstEmployee'));
    }
    
    public function store()
    {
        $id = abs((int)request('id'));
        $output  = '';
        $success = 0;
        
        $employee = Employee::find($id);
        
        if ($employee) {
            $success = 1;
            $output  = $employee;
        }
        
        return response()->json(['success' => $success, 'employee' => $output]);
    }
}
