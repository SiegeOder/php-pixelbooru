@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/posts/create.css') }}">
@endsection

@section('content')
    <div class="content">

        <span class="padding">*** You will be able to draw pixel arts in future updates ***</span>
        <div class="border padding fg">
            <form class="upload-form" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" accept="image/*" class="border bg" id="id_image">
                <input type="submit" class="active link bg border" value="Upload">
            </form>
        </div>
    </div>
@endsection
