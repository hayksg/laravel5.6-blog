@extends('layouts/admin')

@section('content')          

    <div class="blog-post">
		<h3 class="blog-post-title mb-4">Create post</h3>

		@include('layouts.errors')

		<form action="/admin/posts" method="post">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" class="form-control" id="title" name="title" required>
			</div>
			<div class="form-group">
				<label for="content">Content:</label>
				<textarea class="form-control" id="content" name="content" required></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Publish</button>
			</div>
		</form>
      
    </div><!-- /.blog-post -->

@endsection
      