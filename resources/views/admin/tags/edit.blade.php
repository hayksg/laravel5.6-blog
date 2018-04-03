@extends('layouts-admin/admin-right-flash')
@section('title', "| edit $tag->name tag")          
@section('content')          

<div class="row">
    <div class="col-sm-12">
        <div class="blog-post">
            <h3 class="blog-post-title mb-4">Edit tag: <strong>{{ $tag->name }}</strong></h3>
        </div>
    </div>
</div>

<form action="/admin/tags/{{ $tag->name }}" method="post" class="form-inline">
    {{ csrf_field() }}
    
    <input type="hidden" name="_method" value="put">

    <div class="form-group">
        <label for="name">Tag name:</label>&nbsp;&nbsp;
        <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@include('layouts-admin.errors')

@endsection
      