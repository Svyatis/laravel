<html>
<head>
    <meta charset='utf-8'/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <title>{{ trans('main.Global Company') }}</title>
</head>
<body>
<div class="wrapper">
<nav>
    <span id="leftBar">
    <a href="{{ url('/', ['locale' => 'ua']) }}">UA</a>
    <a href="{{ url('/', ['locale' => 'en']) }}">EN</a>
    </span>
    <ul>
        <li>
            <a id="course" href="{{ url('aboutUs') }}">ABOUT US</a></span>
        </li>
        <li>
            <a id="upload" href="{{ url('upload') }}">UPLOAD</a>
        </li>
        <li>
            <a id="blog" href="{{ url('blog') }}">BLOG</a>
        </li>
        <li>
            <a id="contactUs" href="{{ url('contactUs') }}">CONTACT US</a>
        </li>
        <span class="rightBar">
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li><a><strong>{{ Auth::user()->name }}</strong></a></li>
            <li><a href="{{ url('/logout') }}">Logout</a></li>
        @endif
        </span>
    </ul>
</nav>

@if(Session::has('message'))
    <div class="alert-info">
        {{Session::get('message')}}
    </div>
@endif

<div id="content">
    @yield('content')
</div>

<aside>
    @yield('aside')
</aside>

<div class="footer">
    <a href="{{ url('/') }}">Copyright © 2016 svyatis.com</a>
</div>

</div>
</body>
</html>