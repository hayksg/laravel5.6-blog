@extends('layouts/master')

@section('content')     

    @if(! $post)
      <h2 class="blog-post-title">There are no any post yet</h2>
    @else

      <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <strong>{{ $post->user->name }}</strong></p>

        <p>{{ $post->content }}</p>
        <div><a href="/" class="btn btn-outline-primary btn-sm">&larr; Back</a></div>
      </div>
      <hr>

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

      @include('layouts.errors')

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
      