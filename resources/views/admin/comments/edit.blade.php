@extends('layouts-admin/admin-right-flash')
@section('title', "| Manage comments")

@section('content')          

<div class="blog-post mb-4">
    <h3 class="blog-post-title">Manage Comments</h3>
</div>

@if($post && $post->comments && count($post->comments) > 0)

    <div class="row my-4">
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" id="search" placeholder="Search comment" autocomplete="off">
            </div> 
        </div>
    </div>

    <div id="admin-comments-form">
        
    @include('layouts-admin.errors')

    @foreach($post->comments as $comment)

        @if($comment->user) <!-- Do not show comment if user deleted -->
        <div class="admin-comments-block">         
            
            <form action="/admin/comments/{{ $comment->id }}" method="post">
                
                @csrf
                <input type="hidden" name="_method" value="put">
                
                <div>
                    <strong>{{ $comment->user->name }}</strong>&nbsp;&nbsp;[ 
                    <small>{{ $comment->created_at->diffForHumans() }} ]</small>
                </div>
                <br>
                <div class="form-group">
                    <textarea name="content" class="form-control">{{ $comment->content }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-info">Edit</button>
                </div>
            </form>
            
            <form action="/admin/comments/{{ $comment->id }}" method="post" class="comment-delete app-delete-form confirm-plugin-delete">
                {{ csrf_field() }}
                
                <input type="hidden" name="_method" value="delete">
                
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </div>
            </form>        
            
        </div>
        
        @endif
    @endforeach
    
    </div>

@endif

@endsection
      