@extends('layouts.app')

@section('styles')
    <link href="{{ asset('assets/css/app/user_container.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app/drop_menu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/posts/post.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="sidebar">
        <div class="fg border padding">
            <div>
                <span>Tags:</span>
                <ul class="tagbar">
                    @foreach($post->tags as $tag)
                        <li class="tag-type-{{ $tag->type }}">
{{--                            <form action="{{ route('tags.show', $tag->id) }}" method="get">--}}
                            <form action="#" method="get">
                                <input type="text" name="definition" value="{{ $tag->name }}">
                                <input type="submit" value="?">
                            </form>
                            <form action="{{ route('posts.index') }}" method="get">
                                <input type="text" name="tags" value="{{ $tag->name }}">
                                <input type="submit" value="{{ $tag->name }}">
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <span>Statistics:</span><br>
                <span>Posted: {{ $post->created_at }}</span><br>
                <span>Author: <a href="{{ route('profiles.show', $post->user) }}">{{ $post->user->username }}</a></span><br>
                <div style="width: 10rem">
                    <a href="{{ route('profiles.show', $post->user) }}">
                        <img class="border bg" style="width: 100%; display: block;" src="/storage/{{ $post->user->profile->image }}" alt="">
                    </a>
                </div>
            </div>
            <div>
                <span>Options:</span><br>
                <a href="/storage/{{ $post->image }}" download>Download</a><br>
                <a href="#">Report</a><br>
            </div>
        </div>
    </div>
    <div id="content">

        <div class="fg border padding">
            <img class="border" style="width: 100%; display: block;" src="/storage/{{ $post->image }}" alt="post {{ $post->id }}">
        </div>

        <div class="comment-area">
            @guest
                <div class="fg border padding">
                    <a href="{{ route('signin.index') }}">You must be signed in to post comments...</a>
                </div>
            @endguest

            @auth
                <div class="fg border padding">
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input style="display: none" type="text" name="post" value="{{ $post->id }}">
                        <textarea required class="bg border" rows="7" name="text" placeholder="Add a comment..."></textarea>
                        <input type="submit" value="Post" class="active border bg link">
                    </form>
                </div>
            @endauth

            @foreach($post->comments as $comment)
                <div class="user-container fg border padding">
                    <div class="user-container-image">
                        <a href="{{ route('profiles.show', $comment->user->id) }}">
                            <img class="border bg" src="/storage/{{ $comment->user->profile->image }}" alt="">
                        </a>
                    </div>
                    <div class="user-container-body">
                        <div>
                            <div>
                                <a href="{{ route('profiles.show', $comment->user->id) }}">{{ $comment->user->username }}</a>
                                <span>{{ $comment->created_at }}</span>
                            </div>
                            <div class="drop-menu">
                                <span>•••</span>
                                <div class="drop-menu-body bg border ">
                                    <a href="#">Report</a>
                                </div>
                            </div>
                        </div>
                        <span>{{ $comment->text }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

