@extends('layouts-admin/admin')

@section('content')          

    <div class="blog-post">
        <h3 class="blog-post-title mb-4">Create category</h3>
        <hr>

        @include('layouts-admin.errors')
        <div class="row">
            <div class="col-lg-6">
                <form action="/admin/posts" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>         

                    <div class="form-group">
                        <label for="content">Category:</label>
                        <select class="form-control" id="category" name="category" required>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group my-4">
                        <label class="custom-checkbox">Is Visible:
                            <input type="checkbox" name="is_visible" value="1">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="order">Order:</label>
                        <input type="text" class="form-control" id="order" name="order" required size="10">
                    </div>  

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
      
    </div><!-- /.blog-post -->

@endsection
      