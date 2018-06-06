@extends('layouts-admin/admin')

@section('content')          

<div class="blog-post">
    
    <h3 class="blog-post-title mb-4">Edit post</h3>
    <hr>
    
    @include('layouts-admin.errors')
    
    <form action="{{ url('/') }}/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $post->description }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content">{{ $post->content }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="content">Category:</label>
            <select class="form-control" id="category" name="category" required>
                @foreach($categories as $category)
                    @if($category->name === $post->category->name)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
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
        
        <div class="form-group my-4">
            <label class="custom-checkbox">Is Visible:
                <input type="checkbox" 
                       name="is_visible" 
                       value="{{ $post->is_visible ?: 'on' }}"
                       {{ $post->is_visible ? 'checked' : '' }}
                >
                <span class="checkmark"></span>
            </label>
        </div>

        <div class="form-group">             
            
            <div class="my-2">
                @if($post->img)
                    <label for="img" class="mr-2">Image:</label> 
                    <img src="{{ asset('storage/upload/' . $post->img) }}" class="img-fluid admin-img-edit" alt="image">
                @else
                    No image
                @endif
            </div>
            <input type="file" name="img" id="img" class="form-control filestyle">
        </div>
        
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

</div>

@endsection
      