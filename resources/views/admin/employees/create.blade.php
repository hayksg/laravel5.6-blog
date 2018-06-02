@extends('layouts-admin/admin')
@section('title', "| Add Employee")

@section('content')          

    <div class="blog-post">
        <h3 class="blog-post-title mb-4">Add employee</h3>
        <hr>

        @include('layouts-admin.errors')
        
        <div class="row">
            <div class="col-lg-6">
                <form action="/admin/employees" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old( 'name' ) }}" required>
                    </div>         

                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="text" class="form-control" id="age" name="age" value="{{ old( 'age' ) }}" required>
                    </div>         

                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" class="form-control" id="position" name="position" value="{{ old( 'position' ) }}" required>
                    </div> 
                    
                    <div class="form-group">
                        <label for="content">Performance:</label>
                        <textarea class="form-control" id="content" name="performance">{{ old( 'performance' ) }}</textarea>
                    </div> 
                    
                    <div class="form-group">
                        <label for="salary">Salary:</label>
                        <input type="text" class="form-control" id="salary" name="salary" value="{{ old( 'salary' ) }}" required>
                    </div>  
                    
                    <div class="form-group">
                        <label for="hired">Hired:</label>
                        <input type="text" class="form-control" id="hired" name="hired" value="{{ old( 'hired' ) }}" required>
                    </div>  
                    
                    <div class="form-group">             
                        <label for="img">Image:</label> 
                        <input type="file" name="img" id="img" class="form-control filestyle" value="{{ old( 'img' ) }}" required>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
      
    </div><!-- /.blog-post -->

@endsection
      