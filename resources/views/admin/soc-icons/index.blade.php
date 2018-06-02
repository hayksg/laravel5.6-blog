@extends('layouts-admin/admin-right-flash')
@section('title', "| Manage soc icons")

@section('content')          

<div class="blog-post">
    <h3 class="blog-post-title mb-4">Manage Soc Icons</h3>
    <hr>
    
    <form action="/admin/soc-icons" method="post" class="mb-3">
        @csrf

        <div class="form-group">
            <label for="github">GitHub:</label>
            <input type="text" class="form-control" id="github" name="github" value="{{ $github }}" required>
        </div>
        
        <div class="form-group">
            <label for="twitter">Twitter:</label>
            <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $twitter }}" required>
        </div> 
        
        <div class="form-group">
            <label for="facebook">Facebook:</label>
            <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $facebook }}" required>
        </div> 
        
        <div class="form-group">  
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    @include('layouts-admin.errors')
</div>

@endsection
      