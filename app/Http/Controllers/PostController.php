<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        if(request()['tags'])
        {
            $posts = Post::whereHas('tags', function ($query) {
                $query->whereIn('name', explode(' ', request()['tags']));
            })->orderBy('id', 'desc')->paginate(30);
        }
        else $posts = Post::orderBy('id', 'desc')->paginate(30);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'image' => 'required|image',
        ]);
        $path = $request['image']->store('posts/'.date('Y/m/d'), 'public');
        auth()->user()->posts()->create([
            'image' => $path,
        ]);
        return redirect()->route('posts.index');
    }

}
