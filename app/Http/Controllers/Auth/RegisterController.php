<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:45'],
            'email' => ['required', 'string', 'lowercase', 'max:255', 'regex:/^[a-zA-Z0-9./+]+@[{a-zA-Z0-9.-]+/.[a-zA-Z]{2,}$/'],
            'password' => ['required', 'confirmed', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!#%&*?])[A-Za-z\d@$!#%&*?]{8,}$/']
        ], [
            'email.regex' => 'Email format is invalid. Please enter a valid email format.',
            'password.regex' => 'Password must be at least 8 characters long, contain one uppercase letter, one lowercase letter, one digit, and one special character.',
            'password.confirmed' => 'Password confirmation does not match.'
        ]);

        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        if ($newUser) {
            Auth::login($newUser);
            return redirect()->route('dashboard');
        }
    }
}
