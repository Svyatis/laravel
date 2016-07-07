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
            <a id="course" href="aboutUs">ABOUT US</a>
        </li>
        <li>
            <a id="upload" href="upload">UPLOAD</a>
        </li>
        <li>
            <a id="blog" href="blog">BLOG</a>
        </li>
        <li>
            <a id="contactUs" href="contactUs">CONTACT US</a>
        </li>
    </ul>
    </nav>
</nav>
<div id="header">
    <h1> @yield('header')</h1>
</div>

<div id="content">

    @yield('content')
</div>

<div id="footer">
    <nav>
        <ul>
            <li>
                <a id="/" href="/">Copyright © 2016 svyatis.com</a>
            </li>
        </ul>
    </nav>
</div>
</body>
</html>