@extends('layouts-admin/admin')

@section('content')          

    <div class="blog-post">
        <h3 class="blog-post-title mb-4">Create category</h3>
        <hr>

        @include('layouts-admin.errors')
        
        <div class="row">
            <div class="col-lg-6">
                <form action="/admin/categories" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>         

                    <div class="form-group">
                        <label for="parent_id">Parent:</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="0">Has no parent</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group my-4">
                        <label class="custom-checkbox">Is Visible:
                            <input type="checkbox" name="is_visible" value="on">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="category_order">Order:</label>
                        <input type="text" class="form-control" id="category_order" name="category_order" required size="10">
                    </div>  

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
      
    </div><!-- /.blog-post -->

@endsection
      