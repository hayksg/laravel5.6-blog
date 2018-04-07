@extends('layouts-admin/admin-right-flash')
@section('title', "| Set favicon")

@section('content')          

<div class="blog-post">
    <h3 class="blog-post-title mb-4">Set favicon</h3>
    <hr>
    
    <form action="/admin/favicon" method="post" class="mb-3" enctype="multipart/form-data">
        @csrf
        
        <div class="my-5">
            <img src="{{ asset('storage/favicon/favicon.ico') }}" class="img-fluid admin-img-edit" alt="image">
        </div>
        
        <div class="form-group">             
            <label for="favicon">Favicon image:</label> 
            <input type="file" name="favicon" id="favicon" class="form-control filestyle" required>
        </div>
        
        <div class="form-group">  
            <button type="submit" class="btn btn-primary">Set</button>
        </div>
    </form>
    @include('layouts-admin.errors')
</div>

@endsection
      