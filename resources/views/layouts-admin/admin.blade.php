@include('layouts-admin/header-admin')
@include('layouts-admin/admin-nav')
@include('layouts-admin/flash')


<div class="container-fluid">

    <div class="row">

        <div class="col-sm-2 admin-sidebar">
            @include('layouts-admin.manage')
        </div>
        
        <div class="col-sm-10">
            @yield('content')
        </div>

    </div><!-- /.row -->

</div><!-- /.container -->
<br>
<br>
<br>
@include('layouts-site/footer')