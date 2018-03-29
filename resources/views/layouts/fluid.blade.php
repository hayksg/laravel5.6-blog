@include('layouts/header')
@include('layouts/nav')
@include('layouts/flash')


<div class="container-fluid">

    <div class="row">

        <div class="col-sm-12">

            @yield('content')

        </div><!-- /.blog-main -->

    </div><!-- /.row -->

</div><!-- /.container -->
<br>
<br>
<br>
@include('layouts/footer')