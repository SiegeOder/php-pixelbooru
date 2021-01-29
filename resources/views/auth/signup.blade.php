@extends('layouts.app')

@section('styles')
    <link href="{{ asset('assets/css/auth/auth.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="content">
        <span>Sign up to PixelBooru</span>
        <form class="padding border fg auth-form" action="{{ route('signup.store') }}" method="post">
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
            <input class="border bg" type="password" name="password_confirmation" placeholder="Password confirmation">
            <input class="active border bg link" type="submit" value="Sign up">
        </form>
        <a href="{{ route('signin.index') }}">I have an account</a>
    </div>
@endsection
