<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>Goi Che Online</title>
    {{ HTML::style('/css/style.css') }}
    {{ HTML::style('/css/pure-min.css') }}
    {{ HTML::style('/css/baby-blue.css') }}
    {{ HTML::style('/css/grids-responsive-min.css') }}
</head>
<body>
    <div id="container">
        <div id="nav">
            <ul>
                <li>{{ HTML::linkRoute('home', 'Home') }}</li>
                @if(Auth::check())
                    <li>{{ HTML::linkRoute('profile', 'Profile ('.Auth::user()->id.')') }}</li>
                    <li>{{ HTML::linkRoute('logout', 'Logout ('.Auth::user()->username.')') }}</li>
                @else
                    <li>{{ HTML::linkRoute('login', 'Login') }}</li>
                @endif
            </ul>
        </div><!-- end nav -->

        <!-- check for flash notification message -->
        @if(Session::has('flash_notice'))
            <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
        @endif

        <div class="content">
          @yield('content')
        </div>
    </div><!-- end container -->
</body>
</html>