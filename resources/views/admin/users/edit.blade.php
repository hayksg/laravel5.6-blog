@extends('layouts-admin/admin')
@section('title', "| Edit user")

@section('content')          

<div class="blog-post mb-4">
    <h3 class="blog-post-title">Edit User</h3>
</div>

<div class="blog-post">
    <div>Name: <strong>{{ $user->name }}</strong></div>
    <div>Created at: <strong>{{ $user->created_at }}</strong></div>
    <div>Role: <strong>{{ $user->admin }}</strong></div>
</div>


@endsection
      