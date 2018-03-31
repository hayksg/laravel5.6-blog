@extends('layouts-admin/admin')

@section('content')          

<div class="blog-post">
    
    <h3 class="blog-post-title mb-4">Edit post</h3>
    <hr>
    
    @include('layouts-admin.errors')
    
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
            <label for="tags">Tags:</label>
            <select multiple class="form-control js-example-basic-multiple" id="tags" name="tags[]" multiple="multiple">

                @foreach($allTags as $key => $tag)
                
                    @foreach($post->tags as $postTag)
                        @if($postTag->name == $tag)
                            <option value="{{ $key }}" selected>{{ $tag }}</option>
                            @continue(2)
                        @endif
                    @endforeach
                    
                    <option value="{{ $key }}">{{ $tag }}</option>
                @endforeach
                      
            </select>
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
      