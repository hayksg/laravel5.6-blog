@extends('layouts-admin/admin')
@section('title', "| Manage Employees")

 
@section('content') 

<div class="blog-post">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="blog-post-title mb-4">Manage employees</h3>
        </div>
        <div class="col-sm-6 text-right">
            <a href="/admin/employees/create" class="btn btn-outline-primary">Add employee</a>
        </div>
    </div>

    <hr>

    @if(! $employees || count($employees) == 0)

    <h5 class="mb-4">The list is empty</h5>

    @else

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Age</th>
                <th>Position</th>
                <th>Performance</th>
                <th>Salary</th>
                <th>Hired</th>               
                <th>Image</th>               
                <th>Actions</th>
            </tr>
            @foreach($employees as $employee)
            <tr>
                <td>{{ ++$cnt }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->age }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ strip_tags(getTitle($employee->performance)) }}</td>
                <td>${{ $employee->salary }}</td>
                <td>{{ $employee->hired }}</td>
                <td><img src="{{ asset('storage/employee/' . $employee->img) }}" class="img-fluid admin-img" alt="image"></td>
                <td>
                    <a href="/admin/employees/{{ $employee->id }}/edit">Edit</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <form action="/admin/employees/{{ $employee->id }}" method="post" class="app-delete-form confirm-plugin-delete">

                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="delete">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    @endif

</div>

@endsection
      