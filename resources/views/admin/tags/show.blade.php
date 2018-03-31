@extends('layouts-admin/admin')
@section('title', "| $tag->name tag")          
@section('content')          

<div class="row">
    <div class="col-sm-6">
        <div class="blog-post">
            <h3 class="blog-post-title mb-4">Tag name: {{ $tag->name }}</h3>
            <div>Posts count: <small class="badge badge-primary">{{ $tag->posts()->count() }}</small></div>
        </div>
    </div>
    <div class="col-sm-6 text-right">
        <a href="#" class="btn btn-outline-primary">Edit</a>
    </div>
</div>
<div class="row my-4">
    <div class="col-sm-10">
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


@endsection
      