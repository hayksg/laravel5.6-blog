@include('layouts-site/header-ajax')
@include('layouts-site/nav')

<div class="container">

    <div class="row">

        <div class="col-sm-12 blog-main">

            @yield('content')

        </div><!-- /.blog-main -->

    </div><!-- /.row -->

</div><!-- /.container -->
<br>
<br>
<br>
@include('layouts-site/footer')