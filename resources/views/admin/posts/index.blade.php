@extends('layouts-admin/admin')

 
@section('content') 

<div class="blog-post">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="blog-post-title mb-4">Manage posts</h3>
        </div>
        <div class="col-sm-6 text-right">
            <a href="/admin/posts/create" class="btn btn-outline-primary">Create post</a>
        </div>
    </div>

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
                <th>Category</th>
                <th>Created at</th>
                <th>Image</th>
                <!-- <th>Tags</th> -->
                <th>Is visible</th>
                <th>Actions</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{ ++$cnt }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ getTitle($post->title) }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->created_at->toFormattedDateString() }}</td>
                <td><img src="{{ asset('storage/upload/' . $post->img) }}" class="img-fluid admin-img" alt="image"></td>
                <!--
                <td>
                    @if(! count($post->tags))
                        <span>No tags</span>
                    @else
                        @foreach($post->tags as $tag)
                        {{ $tag->name }}&nbsp;
                        @endforeach
                    @endif
                </td>
                -->
                <td>{{ $post->is_visible ? 'Yes' : 'No' }}</td> 
                <td>
                    <a href="/admin/posts/{{ $post->id }}/edit">Edit</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <form action="/admin/posts/{{ $post->id }}" method="post" class="app-delete-form confirm-plugin-delete">

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

</div>

@endsection
      