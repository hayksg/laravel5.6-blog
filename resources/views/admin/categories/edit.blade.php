@extends('layouts-admin/admin')

@section('content')          

    <div class="blog-post">
        <h3 class="blog-post-title mb-4">Edit category</h3>
        <hr>

        @include('layouts-admin.errors')
        <div class="row">
            <div class="col-lg-6">
                <form action="/admin/categories/{{ $category->name }}" method="post">
                    @csrf
                    
                    <input type="hidden" name="_method" value="put">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" 
                               class="form-control" 
                               id="name" name="name" 
                               required 
                               value="{{ $category->name }}"
                        >
                    </div>         

                    <div class="form-group">
                        <label for="parent_id">Parent:</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="0">Has no parent</option>
                            @foreach($categories as $value)
     
                                @if($value->name === $category->name) 
                                    @continue
                                @elseif($value->id === $category->parent_id)
                                    <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endif
                
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group my-4">
                        <label class="custom-checkbox">Is Visible:
                            <input type="checkbox" 
                                   name="is_visible" 
                                   value="{{ $category->is_visible ?: 'on' }}"
                                   {{ $category->is_visible ? 'checked' : '' }}
                            >
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="category_order">Order:</label>
                        <input type="text" 
                               class="form-control" 
                               id="category_order" 
                               name="category_order" 
                               required 
                               value="{{ $category->category_order }}"
                        >
                    </div>  

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
      
    </div><!-- /.blog-post -->

@endsection
      