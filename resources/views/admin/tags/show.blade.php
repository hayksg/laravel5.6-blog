@extends('layouts-admin/admin')
@section('title', "| $tag->name tag")          
@section('content')          

<div class="row">
    <div class="col-sm-6">
        <div class="blog-post">
            <h3 class="blog-post-title mb-4">Tag name: <strong class="text-danger">{{ $tag->name }}</strong></h3>
            <div>Related post(s) count: <small class="badge badge-primary">{{ $tag->posts()->count() }}</small></div>
        </div>
    </div>
    <div class="col-sm-6 text-right">
        <a href="/admin/tags/{{ $tag->name }}/edit" class="btn btn-success">Edit</a>
        <form action="/admin/tags/{{ $tag->name }}" method="post" class="app-delete-form confirm-plugin-delete">

            {{ csrf_field() }}

            <input type="hidden" name="_method" value="delete">
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>

@if($tag->posts()->count() != 0)

<div class="row my-4">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Post title</th>
                    <th>Tags</th>
                </tr>
                @foreach($tag->posts as $post)
                <tr>
                    <td>{{ ++$cnt }}</td>
                    <td><a href="{{ route('posts', $post->id) }}">{{ $post->title }}</a></td>
                    <td>
                        @foreach($post->tags as $tag)
                        <span class="badge badge-info">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endif

@endsection
      