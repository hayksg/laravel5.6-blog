<nav class="navbar navbar-expand-md blog-masthead fixed-top navbar-dark ">
    <div class="container-fluid">
        
        <a class="app-navbar-brand nav-link" href="{{ url('/') }}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto"> 
                <li><a class="nav-link" href="#">About Us</a></li>
                <li><a class="nav-link" href="/tutorial">Tutorial</a></li>

                @if(auth()->user())
                <li><a class="nav-link" href="/admin">Admin</a></li>
                @endif

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="/login">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="/register">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Hi&nbsp;&nbsp;{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu app-dropdown-logout" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item dropdown-logout" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
           
    </div>
</nav>
