<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $count = str_split(Post::select('id')->count());
        return view('home.index', compact('count'));
    }
}
