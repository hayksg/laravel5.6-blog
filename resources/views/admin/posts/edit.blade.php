@extends('layouts/admin')

@section('content')          

    <div class="blog-post">
		<h3 class="blog-post-title mb-4">Edit post</h3>
		<form action="/admin/posts/{{ $post->id }}" method="post">
			{{ csrf_field() }}

			<input type="hidden" name="_method" value="put">

			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
			</div>
			<div class="form-group">
				<label for="content">Content:</label>
				<textarea class="form-control" id="content" name="content">{{ $post->content }}</textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
      
    </div><!-- /.blog-post -->

@endsection
      