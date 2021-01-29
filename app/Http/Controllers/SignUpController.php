<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.signup');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'username' => 'required',
            'password' => 'required|confirmed',
        ]);
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        auth()->attempt($request->only('username', 'password'));
        return redirect()->route('profiles.index');
    }

}
