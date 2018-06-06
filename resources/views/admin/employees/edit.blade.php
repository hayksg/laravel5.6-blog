@extends('layouts-admin/admin')
@section('title', "| Edit Employee")

@section('content')          

    <div class="blog-post">
        <h3 class="blog-post-title mb-4">Edit employee</h3>
        <hr>

        @include('layouts-admin.errors')
        
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ url('/') }}/admin/employees/{{ $employee->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="hidden" name="_method" value="put">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
                    </div>         

                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="text" class="form-control" id="age" name="age" value="{{ $employee->age }}" required>
                    </div>         

                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" class="form-control" id="position" name="position"  value="{{ $employee->position }}" required>
                    </div> 
                    
                    <div class="form-group">
                        <label for="content">Performance:</label>
                        <textarea class="form-control" id="content" name="performance" required>{{ $employee->performance }}</textarea>
                    </div> 
                    
                    <div class="form-group">
                        <label for="salary">Salary:</label>
                        <input type="text" class="form-control" id="salary" name="salary" value="{{ $employee->salary }}" required>
                    </div>  
                    
                    <div class="form-group">
                        <label for="hired">Hired:</label>
                        <input type="text" class="form-control" id="hired" name="hired" value="{{ $employee->hired }}" required>
                    </div>  
                    
                    <div class="form-group">             
                        <label for="img">Image:</label> 
                        <div class="my-2">
                            <img src="{{ asset('storage/employee/' . $employee->img) }}" class="img-fluid admin-img-edit" alt="image">
                        </div>
                        <input type="file" name="img" id="img" class="form-control filestyle">
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
      
    </div><!-- /.blog-post -->

@endsection
      