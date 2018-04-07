<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use Purifier;

class EmployeeController extends Controller
{
    public function index()
    {
        $cnt = 0;
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees', 'cnt'));
    }
    
    public function create()
    {
        return view('admin.employees.create');
    }
    
    public function store()
    {
        $this->validate(request(), [
            'name'        => 'required|regex:/^[^<>]+$/u|max:255',
            'age'         => 'required|integer|max:100',          
            'position'    => 'required|regex:/^[^<>]+$/u|max:255',          
            'performance' => 'required',
            'salary'      => 'required|regex:/^\d{0,5}(\.\d{2})?$/',
            'hired'       => 'required|date_format:Y-m-d',
            'img'         => 'required|image|max:10000',
    	]);
        
        if (request()->hasFile('img')) {
            $filePath      = basename(request('img')->store('public/employee'));
        }
        
        Employee::create([
            'name'        => request('name'),
            'age'         => request('age'),
            'position'    => request('position'),
            'performance' => Purifier::clean(request('performance')),
            'salary'      => request('salary'),
            'hired'       => request('hired'),
            'img'         => $filePath,
        ]);
        
        session()->flash('message', 'The employee successfully added!');
        return redirect('admin/employees');
    }
    
    public function edit(Employee $employee)
    {
        $cnt = 0;
        return view('admin.employees.edit', compact('employee', 'cnt'));
    }
    
    public function update(Employee $employee)
    {
        $this->validate(request(), [
            'name'        => 'required|regex:/^[^<>]+$/u|max:255',
            'age'         => 'required|integer|max:100',          
            'position'    => 'required|regex:/^[^<>]+$/u|max:255',          
            'performance' => 'required',
            'salary'      => 'required|regex:/^\d{0,5}(\.\d{2})?$/',
            'hired'       => 'required|date_format:Y-m-d',
            'img'         => 'image|max:10000',
    	]);
        
        if (request()->hasFile('img')) {
            Employee::deleteImage($employee->img);
            $filePath  = basename(request('img')->store('public/employee'));
            $employee->img = $filePath;
        }
        
        $employee->name        = request('name');
        $employee->age         = request('age');
        $employee->position    = request('position');
        $employee->performance = Purifier::clean(request('performance'));
        $employee->salary      = request('salary');
        $employee->hired       = request('hired');
        
        $employee->update();

        session()->flash('message', 'The employee successfully edited!');
        return redirect('admin/employees');
    }
    
    public function destroy(Employee $employee)
    {
        $employee->delete();
        
        Employee::deleteImage($employee->img);
        
        session()->flash('message', 'The employee successfully deleted!');
        return back();
    }
}
