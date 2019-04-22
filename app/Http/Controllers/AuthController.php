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

        return redirect()->home();

    }

    public function logout() {
        auth()->logout();
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

        return redirect()->home();
    }
}
