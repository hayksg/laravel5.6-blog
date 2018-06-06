@extends('layouts-admin/admin-right-flash')
@section('title', "| Manage comments")

@section('content')          

<div class="blog-post">
    <h3 class="blog-post-title">Manage Comments</h3>
</div>

@if(! $posts || count($posts) == 0)

<hr>
<h5 class="mb-4">The list is empty</h5>

@else

<div class="row my-4">
    <div class="col-sm-4">
        <div class="form-group">
            <input type="text" class="form-control" id="search" placeholder="Search article in which comment" autocomplete="off">
        </div> 
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-striped" id="postsTable">
        <tr>
            <th>#</th>
            <th>Article title</th>
            <th>Action</th>
        </tr>
        @foreach($posts as $post)
        <tr>
            <td>{{ ++$cnt }}</td>
            <td>{{ $post->title }}</td>
            <td>
                <a href="{{ url('/') }}/admin/comments/{{ $post->id }}/edit">View comment(s)</a>              
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endif



@endsection