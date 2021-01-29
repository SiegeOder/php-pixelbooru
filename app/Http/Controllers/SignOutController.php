<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class SignOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(){
        auth()->logout();
        return redirect()->route('home');
    }
}
