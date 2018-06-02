@extends('layouts-admin/admin-right-flash')
@section('title', "| Manage tags")

@section('content')          

<div class="blog-post">
    <h3 class="blog-post-title mb-4">Manage Tags</h3>
    
    <form action="/admin/tags" method="post" class="form-inline mb-3">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Tag name:</label>&nbsp;&nbsp;
            <input type="text" class="form-control" id="name" name="name" placeholder="create tag" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @include('layouts-admin.errors')
    <hr class="mt-4">
    
    @if(! count($tags))
    <h5 class="mt-4 mb-3">List is empty</h5>
    @else
    <h5 class="mt-4 mb-3">Tag(s) list</h5>
    <div class="row">
        <div class="col-sm-12">
            
            <ul class="list-unstyled">
                @foreach($tags as $tag)
                <li><a href="/admin/tags/{{ $tag->name }}">{{ $tag->name }}</a></li>
                @endforeach
            </ul>
            
        </div>
    </div>
    
    @endif

</div>

@endsection
      