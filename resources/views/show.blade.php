@extends('layouts-site/master')
@section('title', "| $post->title")

@section('content')     

    @if(! $post)
      <h2 class="blog-post-title">There are no any post yet</h2>
    @else

      <div class="blog-post mb-2">
        <img src="{{ asset('storage/upload/' . $post->img) }}" class="img-fluid" alt="image">
        <h2 class="blog-post-title mt-4">{{ $post->title }}</h2>
        <div class="blog-post-meta mt-3">
            <i class="fa fa-calendar"></i>&nbsp;&nbsp;{{ $post->created_at->toFormattedDateString() }} by 
            <strong>{{ $post->user->name }}</strong>
        </div>
        <div class="blog-post-meta category-name">Category: <strong>{{ $post->category->name }}</strong></div>

        <p>{{ $post->content }}</p>
        
        
        @if(count($post->tags))
        <hr>
        <ul class="list-unstyled list-inline">
            <strong>Tags:</strong>&nbsp;&nbsp;
            @foreach($post->tags as $tag)
            <li class="list-inline-item"><small><a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a></small></li>
            @endforeach
        </ul>
        @endif

      </div>
      <hr class="mb-5">

      @if($post->comments && count($post->comments) > 0)

        <ul class="list-group">
          @foreach($post->comments as $comment)
          <li class="list-group-item mb-2">
            <div><strong>{{ $comment->user->name }}</strong>&nbsp;&nbsp;[ <small>{{ $comment->created_at->diffForHumans() }} ]</small></div>
            {{ $comment->content }}
          </li>
          @endforeach
        </ul>

      @endif

      @include('layouts-admin.errors')

      <form action="/posts/{{ $post->id }}/comments" method="post">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="content">Add comment:</label>
          <textarea class="form-control" id="content" name="content" required></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>

    @endif

@endsection
      