<html>
<head>
    <meta charset='utf-8'/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/reset.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <title>{{ trans('main.Global Company') }}</title>
</head>
<body>
<nav>
    <span id="leftBar">
        <a href="{{ url('/', ['locale' => 'ua']) }}">UA</a>
        <a href="{{ url('/', ['locale' => 'en']) }}">EN</a>
    </span>

    <span id="central">
        <a href="{{ url('aboutUs') }}">ABOUT US</a>
        <a href="{{ url('upload') }}">UPLOAD</a>
        <a href="{{ url('blog') }}">BLOG</a>
        <a href="{{ url('contactUs') }}">CONTACT US</a>
    </span>

    <span class="rightBar">
        @if (Auth::guest())
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        @else
            <a><strong>{{ Auth::user()->name }}</strong></a>
            <a href="{{ url('/logout') }}">Logout</a>
        @endif
    </span>
</nav>

@if(Session::has('message'))
    <div class="alert-info">
        {{Session::get('message')}}
    </div>
@endif

<div id="wrapper">
<div id="content" style="width: 30%; float:left">
    @yield('content')
</div>

<div id="leftPart" style="width: 70%; float:right">
    @yield('aside')
</div>

<div class="footer">
    <a href="{{ url('/') }}">Copyright © 2016 svyatis.com</a>
</div>

</div>
</body>
</html>