<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.signin');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        if (!auth()->attempt($request->only('username', 'password'))){
            return back()->with('errorMessages', 'Incorrect username or password. ');
        }
        return redirect()->route('profiles.index');
    }

}
