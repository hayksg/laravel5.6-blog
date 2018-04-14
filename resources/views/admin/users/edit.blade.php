@extends('layouts-admin/admin')
@section('title', "| Edit user")

@section('content')          

<div class="blog-post mb-4">
    <h3 class="blog-post-title">Edit User</h3>
</div>

<div class="blog-post">
    <div>Name: <strong>{{ $user->name }}</strong></div>
    <div>Created at: <strong>{{ $user->created_at->toFormattedDateString() }}</strong></div>
    <form action="/admin/users/{{ $user->id }}" method="post">
        
        @csrf
        <input type="hidden" name="_method" value="put">
        
        <span>Role:</span>&nbsp;&nbsp;
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="role" id="admin" value="admin" @if($user->role === 'admin') checked @endif >
            <label class="form-check-label" for="admin">Admin</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="role" id="user" value="user" @if($user->role === 'user') checked @endif>
            <label class="form-check-label" for="user">User</label>
        </div>
        <div class="mt-3">
            <input type="submit" name="delete" value="Change Role" class="btn btn-outline-primary">
        </div>
    </form>
</div>


@endsection
      