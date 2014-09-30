<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>Che Online</title>
    {{ HTML::style('/css/style.css') }}
    {{ HTML::style('/css/rwd.css') }}
    {{-- HTML::style('/css/rwd2.css') --}}
    {{ HTML::style('/css/baby-blue.css') }}
    {{ HTML::style('/css/grids-responsive-min.css') }}
   

    {{-- HTML::style('assets/stylesheets/foundation.css')--}}
    
    {{ HTML::script('/js/jquery-1.11.1.min.js') }}
    {{ HTML::script('/js/jquery.numeric.js') }}
    {{-- HTML::style('/css/bootstrap-datetimepicker.min.css') --}}
    {{-- HTML::style('css/bootstrap-responsive.css') --}}
    {{-- HTML::style('/css/bootstrap.css') --}}
    {{ HTML::style('/css/pygment_trac.css') }}

    {{-- HTML::script('/js/bootstrap-datetimepicker.min.js') --}}
    {{-- HTML::script('/js/bootstrap-datetimepicker.pt-BR.js') --}}

</head>
<body>
    <div id="container">
        <div id="nav">
            <ul>
                <li>{{ HTML::linkRoute('home', 'Home') }}</li>
                @if(Auth::check())
                  @if(Auth::user()->role_id == ROLE_ADMIN)
                    <li>{{ HTML::linkRoute('dashboard.index', 'Manage Order') }}</li>
                    <li>{{ HTML::linkRoute('accounts.create', 'Add User') }}</li>
                    <li>{{ HTML::linkRoute('products.create','Add Product') }}</li>
                    <li>{{ HTML::linkRoute('accounts.index','List User') }}</li>
                    <li>{{ HTML::linkRoute('products.index','List Product') }}</li>
                    <li>{{ HTML::linkRoute('session.create','Add Session') }}</li>
                    <li>{{ HTML::linkRoute('session.index', 'List Order session') }}</li>
                  @else
                    <li>{{ HTML::linkRoute('orders.index','Reserve') }}</li>
                    <li>{{ HTML::linkRoute('profile', 'Profile') }}</li>
                  @endif
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
