@extends('layouts.app')

@section('styles')
    <link href="{{ asset('assets/css/app/user_container.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app/drop_menu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app/picture_grid.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app/pagination.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/profiles/profile.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="content">
        <div class="user-container fg border padding">
            <div class="user-container-image">
            <span>
                <img class="border bg" src="/storage/{{ auth()->user()->profile->image }}"  alt="">
            </span>
            </div>
            <div class="user-container-body">
                <div>
                    <span>{{ auth()->user()->username }}</span>
                    <div class="drop-menu">
                        <span>•••</span>
                        <div class="drop-menu-body bg border ">

                            <a href="#">Edit</a>
                            <form class="form-sign-out" action="{{ route('signout.store') }}" method="post">
                                @csrf
                                <input class="bg link" type="submit" value="Sign out">
                            </form>

                        </div>
                    </div>
                </div>
                <span>{{ auth()->user()->profile->note }}</span>
            </div>
        </div>

    </div>
    @if($posts->count())
        <div class="fg border padding">
            <div class="picture-grid">
                @foreach($posts as $post)
                    <a href="{{ route('posts.show', $post->id) }}">
                        <img src="/storage/{{ $post->image }}" alt="">
                    </a>
                @endforeach
            </div>
            {{ $posts->appends(request()->input())->links() }}
        </div>
        @endif
@endsection
