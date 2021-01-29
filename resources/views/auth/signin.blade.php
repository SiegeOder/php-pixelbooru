@extends('layouts.app')

@section('styles')
    <link href="{{ asset('assets/css/auth/auth.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="content">
        <span>Sign in to PixelBooru</span>
        <form class="padding border fg auth-form" action="{{ route('signin.store') }}" method="post">
            @csrf
            <input class="border bg" type="text" name="username" placeholder="Username" value="{{ old('username') }}" autofocus>
            @error('username')
            <div class="text-error">
                {{ $message }}
            </div>
            @enderror
            <input class="border bg" type="password" name="password" placeholder="Password">
            @error('password')
            <div class="text-error">
                {{ $message }}
            </div>
            @enderror
            <input class="active border bg link" type="submit" value="Sign in">
            @if(session('errorMessages'))
                <div class="text-error">
                    {{ session('errorMessages') }}
                </div>
            @endif
        </form>
        <a href="{{ route('signup.index') }}">Create account</a>
    </div>
@endsection
