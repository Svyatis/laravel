<html>
<head>
    <meta charset='utf-8'/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <title>Global Company</title>
</head>
<body>
<nav>

    <ul>
        <li>
            <a id="course" href="{{ url('aboutUs') }}">ABOUT US</a>
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
    </ul>
    </nav>
</nav>

@if(Session::has('message'))
    <div class="alert-info">
        {{Session::get('message')}}
    </div>
@endif

<div id="content">

    @yield('content')
</div>

<div id="footer">
                <a id='/' href="{{ url('/') }}">Copyright © 2016 svyatis.com</a>
</div>
</body>
</html>