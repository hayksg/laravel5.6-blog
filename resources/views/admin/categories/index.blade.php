@extends('layouts-admin/admin')
@section('title', "| Manage categories")
 
@section('content') 

<div class="blog-post">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="blog-post-title mb-4">Manage categories</h3>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ url('/') }}/admin/categories/create" class="btn btn-outline-primary">Create category</a>
        </div>
    </div>

    <hr>

    @if(! $categories || count($categories) == 0)

    <h5 class="mb-4">The list is empty</h5>

    @else

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Order</th>
                <th>Is visible</th>
                <th>Actions</th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>{{ ++$cnt }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent() }}</td>              
                <td>{{ $category->category_order }}</td>              
                <td>{{ $category->is_visible ? 'Yes' : 'No' }}</td>              
                <td>
                    <a href="{{ url('/') }}/admin/categories/{{ $category->name }}/edit">Edit</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <form action="{{ url('/') }}/admin/categories/{{ $category->name }}" method="post" class="app-delete-form confirm-plugin-delete">

                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="delete">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    @endif

</div>

@endsection
      