@include('layouts-admin/header-admin')
@include('layouts-admin/admin-nav')
@include('layouts-site/flash')

<div class="container-fluid">

    <div class="row">

        <div class="col-xl-2   admin-sidebar">
            @include('layouts-admin.manage')
        </div>
        
        <div class="col-xl-10 ">
            @yield('content')
        </div>
       
    </div><!-- /.row -->

</div><!-- /.container -->
<br>
<br>
<br>
@include('layouts-site/footer')