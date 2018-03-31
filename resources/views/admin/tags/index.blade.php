@extends('layouts-admin/admin')

@section('content')          

<div class="blog-post">
    <h3 class="blog-post-title mb-4">Manage Tags</h3>
    
    <form action="/admin/tags" method="post" class="form-inline">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Tag name:</label>&nbsp;&nbsp;
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    <hr class="mt-4">
    
    <h5 class="mt-5 mb-3">Tags list</h5>

    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Tag name</th>
            </tr>
            @foreach($tags as $tag)
            <tr>
                <td>{{ ++$cnt }}</td>
                <td><a href="/admin/tags/{{ $tag->name }}">{{ $tag->name }}</a></td>              
            </tr>
            @endforeach
        </table>
    </div>
    

</div>

@endsection
      