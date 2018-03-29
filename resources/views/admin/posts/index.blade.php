@extends('layouts/fluid')

@section('content')          

<div class="blog-post">
    <h3 class="blog-post-title mb-4">Manage posts</h3>
    <div><a href="/admin/posts/create" class="btn btn-outline-primary">Create post</a></div>
    <hr>

    @if(! $posts || count($posts) == 0)

    <h5 class="mb-4">The list is empty</h5>

    @else

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>#</th>
                <th>Author</th>
                <th>Title</th>
                <th>Description</th>
                <th>Content</th>
                <th>Created at</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Actions</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{ ++$cnt }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ substr($post->description, 0, 10) }}...</td>
                <td>{{ substr($post->content, 0, 10) }}...</td>
                <td>{{ $post->created_at->toFormattedDateString() }}</td>
                <td><img src="{{ asset('storage/upload/' . $post->img) }}" class="img-fluid admin-img" alt="image"></td>
                <td>
                    @foreach($post->tags as $tag)
                    {{ $tag->name }}&nbsp;
                    @endforeach
                </td>
                <td>
                    <a href="/admin/posts/{{ $post->id }}/edit">Edit</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <form action="/admin/posts/{{ $post->id }}" method="post" class="app-delete-form confirm-plugin-delete">

                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="delete">
                        <input type="submit" name="fooo" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    @endif

</div>

@endsection
      