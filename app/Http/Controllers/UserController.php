<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show register form
    public function register() {
        return view('user.register');
    }
    // Show login form
    public function login() {
        return view('user.login');
    }

    // Store a new user
    public function store(Request $request) {
        $data = $request->validate([
            'name' => ['required','min:3','max:100'],
            'email' => ['required','email', Rule::unique('users','email')],
            'password' => ['required','min:5','confirmed']
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        Auth::login($user);

        return redirect('/')->with('message', 'You are logged in!');
    }

    //Log a user out
    public function logout(Request $request) {
        $request->session()->invalidate();
        auth()->logout();
        
        return redirect('/')->with('message', "You're logged out!");
    }

    //Log a user in
    public function authenticate(Request $request) {
        $data = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($data, $request['remember'])) {
            $request->session()->regenerate();
            return redirect('/')->with('message', "You're logged in!");
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records!'])->onlyInput('email');

    }
}
