<!DOCTYPE html>
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
    <link href="{{ asset('assets/css/app/home.css') }}" rel="stylesheet">
</head>
<body class="fg">
<div id="logo">
    <a href="{{ route('home') }}">
        <span>P</span><span>ixel</span><span>B</span><span>ooru</span>
    </a>
    <a onclick="playMusic()">
        <img src="{{ asset('assets/images/bathory.png') }}" alt="Hi!~">
    </a>
</div>
<div id="navigation">
    <nav>
        <a href="{{ route('posts.index') }}">Posts</a>
        <a href="{{ route('posts.create') }}">Draw</a>
        <a href="{{ route('profiles.index') }}">Profile</a>
    </nav>
    <form action="{{ route('posts.index') }}" method="get">
        <input type="text" name="tags" placeholder="Search" class="bg border">
    </form>
</div>
<div id="counter">
    @foreach($count as $digit)
        <img src="{{ asset("assets/images/{$digit}.gif") }}" alt="{{ $digit }}">
    @endforeach
</div>
<span>Serving {{ implode($count) }} posts – running PixelBooru 1.0.2</span>
<script src="{{ asset('assets/js/mascot.js') }}"></script>
</body>
</html>
