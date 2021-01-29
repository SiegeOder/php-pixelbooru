@extends('layouts.app')

@section('styles')
    <link href="{{ asset('assets/css/app/picture_grid.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app/pagination.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app/drop_menu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/posts/index.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="fg border padding search">
        <div class="drop-menu">
            <form action="{{ route('posts.index') }}" method="get">
                <input class="bg border" type="text" placeholder="Search" name="tags" value="{{ request()['tags'] }} ">
            </form>
            <div class="drop-menu-body bg border ">
                <a href="#">Tag helper</a>
            </div>
        </div>
    </div>
    <div class="fg border padding">
        @if($posts->count())
            <div class="picture-grid">
                @foreach($posts as $post)
                    <a href="{{ route('posts.show', $post->id) }}">
                        <img src="/storage/{{ $post->image }}" alt="">
                    </a>
                @endforeach
            </div>
            {{ $posts->appends(request()->input())->links() }}
        @else
            <span>Nobody here but us chickens!</span>
        @endif
    </div>
@endsection
