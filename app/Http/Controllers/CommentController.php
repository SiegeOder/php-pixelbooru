<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $post = Post::find($request['post'])->comments()->create([
            'user_id' => auth()->user()->id,
            'text' => $request['text'],
        ]);
//        dd($post);
        return redirect()->route('posts.show', $request['post']);
    }
}
