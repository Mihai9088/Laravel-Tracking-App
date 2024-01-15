<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function index()
    {
        return view('layout');
    }

    public function store(Request $request)
    {
        $formfields = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $plainPassword = $request->input('password');
        Session::put('plainPassword', $plainPassword);

        $formfields['password'] = bcrypt($formfields['password']);

        $user = User::create($formfields);



        auth()->login($user);

        return redirect('/register/verification');
    }


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out!');
    }

    public function login()
    {
        return view('users.login');
    }

    public function auth(Request $request)
    {
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formfields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }
        return back()->withErrors(['email' => 'Wrong email or password'])->onlyInput('email');
    }
}
