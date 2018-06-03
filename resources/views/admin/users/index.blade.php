@extends('layouts-admin/admin-right-flash')
@section('title', "| Manage users")

@section('content')          

<div class="blog-post">
    <h3 class="blog-post-title">Manage Users</h3>
</div>

<hr>

@if(! $users || count($users) == 0)

<h5 class="mb-4">The list is empty</h5>

@else

<div class="row my-4">
    <div class="col-sm-4">
        <div class="form-group">
            <input type="text" class="form-control" id="search" placeholder="Search User or Admin" autocomplete="off">
        </div> 
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-striped" id="usersTable">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ ++$cnt }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ ($user->role === 'admin') ? 'Admin' : 'User' }}</td>
            <td>
                <a href="/admin/users/{{ $user->id }}/edit">Edit</a>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <form action="/admin/users/{{ $user->id }}" method="post" class="app-delete-form confirm-plugin-delete">

                    {{ csrf_field() }}

                    <input type="hidden" name="_method" value="delete">
                    <input type="submit" name="delete" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endif



@endsection
      