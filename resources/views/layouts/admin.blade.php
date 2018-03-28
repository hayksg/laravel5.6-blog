@include('layouts/header')
@include('layouts/nav')
@include('layouts/flash')


<div class="container">

    <div class="row">

        <div class="col-sm-12 blog-main">

            @yield('content')

        </div><!-- /.blog-main -->

    </div><!-- /.row -->

</div><!-- /.container -->

@include('layouts/footer')