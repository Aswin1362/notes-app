<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('user.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('note.index');
        }
        return back()->withErrors(['customMessage' => 'The provided credentials do not match our records.']);
    }
}
