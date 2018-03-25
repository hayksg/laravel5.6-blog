@extends('layouts/admin')

@section('content')          

    <div class="blog-post">
      <h3 class="blog-post-title">Admin area</h3>
      <p>You have the following capabilities:</p>
      <ul class="list-unstyled">
          <li><a href="/admin/posts">Manage posts</a></li>
          <li><a href="#">Manage comments</a></li>
          <li><a href="#">Manage users</a></li>
      </ul>
    </div><!-- /.blog-post -->

@endsection
      