@extends('layouts-site/master')

@section('content')

    @if(! $posts || count($posts) == 0)
      <h2 class="blog-post-title">There are no any posts yet</h2>
    @else
        
      @foreach($posts as $post)

      <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">
            <i class="fa fa-calendar"></i>&nbsp;&nbsp;{{ $post->created_at->toFormattedDateString() }} by 
            <strong>{{ $post->user->name }}</strong>
        </p>

        <img src="{{ asset('storage/upload/' . $post->img) }}" class="img-fluid" alt="image">
        
        <p class="mt-4">{{ $post->description }}</p>
        <div><a href="/posts/{{ $post->id }}" class="btn btn-outline-primary btn-sm">Read more &rarr;</a></div>
      </div>
      <hr class="my-5">

      @endforeach
      
      <!-- @include('layouts-site.pagination') -->
      {!! $posts->links('layouts-site.pagination', ['posts' => $posts]) !!}

    @endif

@endsection
      