<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function loginPage() {
        return view('auth.login');
    }

    public function registerPage() {
        return view('auth.register');
    }

    public function register() {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        auth()->login($user);

        session()->flash('message', 'Welcome ' . $user->name . '! Thank you so much for signing up!');

        return redirect()->home();

    }

    public function logout() {
        auth()->logout();
        session()->flash('message', 'You have successfully logged out');
        return redirect()->home();
    }

    public function login() {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (! auth()->attempt(request(['email','password']))) {
            return back()->withErrors([
                'message' => 'invalid credentials',
            ]);
        }

        session()->flash('message', 'Welcome back, ' . auth()->user()->name . '!');

        return redirect()->home();
    }
}
