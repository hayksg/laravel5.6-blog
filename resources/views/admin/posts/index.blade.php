@extends('layouts-admin/admin')
@section('title', "| Manage posts")
 
@section('content') 

<div class="blog-post">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="blog-post-title mb-4">Manage posts</h3>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ url('/') }}/admin/posts/create" class="btn btn-outline-primary">Create post</a>
        </div>
    </div>

    <hr>

    @if(! $posts || count($posts) == 0)

    <h5 class="mb-4">The list is empty</h5>

    @else

    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#perpage">Per page</button>
    <div id="perpage" 
         class="collapse @if ($errors->has('per-page') || $errors->has('per-category-page') || $errors->has('per-tag-page')) show @endif">
        <br>
        <div class="per-page-input">
            <form action="{{ route('per-page') }}" method="get" class="form-inline">
                <div class="form-group">Posts per main page:
                    <input type="text" class="text-center form-control form-control-sm mx-1" name="per-page" size="1" value="{{ $perPage }}">
                </div>

                <button type="submit" class="btn btn-sm btn-outline-primary">Change</button>
            </form>

            @if ($errors->has('per-page'))
                <div><small class="text-danger">{{ $errors->first('per-page') }}</small></div>
            @endif
        </div>

        <div class="per-category-page-input">
            <form action="{{ route('per-category-page') }}" method="get" class="form-inline">
                <div class="form-group">Posts per category page:
                    <input type="text" class="text-center form-control form-control-sm mx-1" name="per-category-page" size="1" value="{{ $perCategoryPage }}">
                </div>

                <button type="submit" class="btn btn-sm btn-outline-primary">Change</button>
            </form>

            @if ($errors->has('per-category-page'))
                <div><small class="text-danger">{{ $errors->first('per-category-page') }}</small></div>
            @endif
        </div>

        <div class="per-tag-page-input">
            <form action="{{ route('per-tag-page') }}" method="get" class="form-inline">
                <div class="form-group">Posts per tag page:
                    <input type="text" class="text-center form-control form-control-sm mx-1" name="per-tag-page" size="1" value="{{ $perTagPage }}">
                </div>

                <button type="submit" class="btn btn-sm btn-outline-primary">Change</button>
            </form>

            @if ($errors->has('per-tag-page'))
                <div><small class="text-danger">{{ $errors->first('per-tag-page') }}</small></div>
            @endif
        </div>
    </div>

    <hr class="mb-5">

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
                <td>
                    @if($post->img)
                        <img src="{{ asset('storage/upload/' . $post->img) }}" class="img-fluid admin-img" alt="image">
                    @else
                        No image
                    @endif
                </td>
                <td>{{ $post->is_visible ? 'Yes' : 'No' }}</td> 
                <td>
                    <a href="{{ url('/') }}/admin/posts/{{ $post->id }}/edit">Edit</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <form action="{{ url('/') }}/admin/posts/{{ $post->id }}" method="post" class="app-delete-form confirm-plugin-delete">

                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="delete">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="my-5">
        {{ $posts->links() }}
    </div>
    
    @endif

</div>

@endsection
      