<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PixelBooru</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
    <link href="{{ asset('assets/css/app/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body class="bg">
<div id="header" class="fg">
    <div id="logo">
        <a href="/">
            <span>P</span><span>ixel</span><span>B</span><span>ooru</span>
        </a>
    </div>
    <nav class="navbar">
        <a class="active border bg link" href="{{ route('posts.index') }}">posts</a>
        <a class="active border bg link" href="{{ route('posts.create') }}">draw</a>
        <a class="active border bg link" href="{{ route('profiles.index') }}">profile</a>
    </nav>
</div>
<div id="main">
    @yield('content')
</div>
<div id="footer" class="fg">
    <span>by <a href="{{ route('profiles.index') }}/1">SODA</a> {{ date('Y') }}</span>
</div>
</body>
</html>
