<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $posts = auth()->user()->posts()->orderBy('id', 'desc')->paginate(30);
        return view('profiles.index', compact('posts'));
    }

    public function show(Profile $profile)
    {
        $posts = $profile->user->posts()->orderBy('id', 'desc')->paginate(30);
        return view('profiles.show', compact('profile', 'posts'));
    }

    public function edit(Profile $profile)
    {
        //
    }

    public function update(Request $request, Profile $profile)
    {
        //
    }

}
