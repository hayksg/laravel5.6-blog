@extends('layouts/master')

@section('content')

    @if(! $posts || count($posts) == 0)
      <h2 class="blog-post-title">There are no any posts yet</h2>
    @else
        
      @foreach($posts as $post)

      <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <strong>{{ $post->user->name }}</strong></p>

        <p>{{ $post->content }}</p>
        <div><a href="/posts/{{ $post->id }}" class="btn btn-outline-primary btn-sm">Read more &rarr;</a></div>
      </div>
      <hr>

      @endforeach

      <!-- @include('layouts.pagination') -->
      {{ $posts->links('layouts.pagination', ['posts' => $posts]) }}

    @endif

@endsection
      