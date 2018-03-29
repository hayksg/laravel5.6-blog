@extends('layouts/admin')

@section('content')          

<div class="blog-post">
    
    <h3 class="blog-post-title mb-4">Edit post</h3>
    <hr>
    
    <form action="/admin/posts/{{ $post->id }}" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description">{{ $post->description }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content">{{ $post->content }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="tag">Tags:</label>
            <input type="text" class="form-control" id="tag" name="tag" 
                   value="@foreach($post->tags as $tag){{ $tag->name }}&nbsp;@endforeach"
            >
        </div>
        
        <div class="form-group">             
            <label for="file">Image:</label> 
            <div class="my-2">
                <img src="{{ asset('storage/upload/' . $post->img) }}" class="img-fluid admin-img-edit" alt="image">
            </div>
            <input type="file" name="file" id="file" class="form-control filestyle">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

</div>

@endsection
      