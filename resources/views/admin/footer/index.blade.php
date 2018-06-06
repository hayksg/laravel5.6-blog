@extends('layouts-admin/admin-right-flash')
@section('title', "| Manage footer")

@section('content')          

<div class="blog-post">
    <h3 class="blog-post-title mb-4">Manage footer</h3>
    <hr>
    
    <form action="{{ url('/') }}/admin/footer" method="post" class="mb-3">
        @csrf

        <div class="form-group">
            <label for="data">Footer data:</label>
            <input type="text" class="form-control" id="data" name="data" value="{{ $content }}" required>
        </div>   
        
        <div class="form-group">  
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    @include('layouts-admin.errors')
</div>

@endsection
      