@extends('layouts-admin/admin-right-flash')
@section('title', "| Manage tags")

@section('content')          

<div class="blog-post">
    <h3 class="blog-post-title mb-4">Manage Tags</h3>
    
    <form action="/admin/tags" method="post" class="form-inline mb-3">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Tag name:</label>&nbsp;&nbsp;
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    @include('layouts-admin.errors')
    <hr class="mt-4">
    
    @if(! count($tags))
    <h5 class="mt-5 mb-3">List is empty</h5>
    @else
    <h5 class="mt-5 mb-3">Tags list</h5>
    <div class="row">
        <div class="col-sm-12">
            
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" style="display: inline-block;">
                    <thead>
                        <tr class="">
                            <th class="" style="width:30px;">#</th>
                            <th class="">Tag name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                        <tr class="">
                            <td class="">{{ ++$cnt }}</td>
                            <td class=""><a href="/admin/tags/{{ $tag->name }}">{{ $tag->name }}</a></td>              
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    
    @endif

</div>

@endsection
      