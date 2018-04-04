@extends('layouts-admin/admin')

@section('content')          

    <div class="blog-post">
        <h3 class="blog-post-title mb-4">Create post</h3>
        <hr>

        @include('layouts-admin.errors')

        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="content">Category:</label>
                <select class="form-control" id="category" name="category" required>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="tags">Tags:</label>
                <select multiple class="form-control js-example-basic-multiple" id="tags" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label class="custom-checkbox">Is Visible:
                    <input type="checkbox" name="is_visible" value="on">
                    <span class="checkmark"></span>
                </label>
            </div>

            <div class="form-group">             
                <label for="img">Image:</label> 
                <input type="file" name="img" id="img" class="form-control filestyle">
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </form>
      
    </div><!-- /.blog-post -->

@endsection
      