<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>Goi Che Online</title>
    {{ HTML::style('/css/style.css') }}
    {{ HTML::style('/css/rwd.css') }}
    {{-- HTML::style('/css/rwd2.css') --}}
    {{ HTML::style('/css/baby-blue.css') }}
    {{ HTML::style('/css/grids-responsive-min.css') }}
    
    {{ HTML::script('/js/jquery-1.11.1.min.js') }}
</head>
<body>
    <div id="container">
        <div id="nav">
            <ul>
                <li>{{ HTML::linkRoute('home', 'Home') }}</li>
                @if(Auth::check())
                  @if(Auth::user()->role_id == ROLE_ADMIN)
                    <li>{{ HTML::linkRoute('accounts.create', 'Add User') }}</li>
                    <li>{{ HTML::linkRoute('dashboard.index', 'Manage') }}</li>
                    <li>{{ HTML::linkRoute('accounts.list','List User') }}</li>
                  @endif
                    <li>{{ HTML::linkRoute('orders.create','Reserve') }}</li>
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

        <section class="content">
        @yield('content')
        </section>

        @yield('closing')
    </div><!-- end container -->
