<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
   
    {{ HTML::style('assets/stylesheets/foundation.css') }}
    {{ HTML::style('assets/stylesheets/custom.css') }}
    {{ HTML::script('/assets/javascripts/custom.modernizr.js') }}
</head>
<body>
<div class="row main">
    <div class="small-12 large-12 column" id="masthead">
        <header>
            <nav class="top-bar" data-topbar>
                <ul class="title-area">
                    <!-- Title Area -->
                    <li class="name"></li>
                    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                </ul>
                <section class="top-bar-section">
                    <ul class="left">
                        <li class="{{(strcmp(URL::full(), URL::to('/')) == 0) ? 'active' : ''}}"><a href="{{URL::to('/')}}">Home</a></li>
                    </ul>
                    <ul class="right">
                        @if(Auth::check())
                            <li class="{{ (strpos(URL::current(), URL::to('user/create'))!== false) ? 'active' : '' }}">
                                {{HTML::link('user/create','Chọn hàng')}}
                            </li>
                            <li class="{{ (strpos(URL::current(), URL::to('logout'))!== false) ? 'active' : '' }}" >
                                {{HTML::link('logout','Logout')}}
                            </li>
                        @else
                            <li class="{{ (strpos(URL::current(), URL::to('login'))!== false) ? 'active' : '' }}">
                                {{HTML::link('login','Login')}}
                            </li>
                        @endif
                    </ul>
                </section>
            </nav>
            <div class="sub-header small-12 large-12 column">
                <hgroup>
                    <!-- <h2>Che Online</h2> -->
                </hgroup>
            </div>
        </header>
    </div>
    <div class="row">
        @yield('content');
        
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>  
    </div>
    <div class="row">
        <div class="small-12 large-12 column">
            <footer class="site-footer" style="text-align:center">2014/25/09</br>Nadia Viet Nam</footer>
        </div>
    </div>
</div>
{{ HTML::script('/assets/javascripts/jquery.js') }}
{{ HTML::script('/assets/javascripts/foundation.min.js') }}
<script>
    $(document).foundation();
</script>
</body>
</html>