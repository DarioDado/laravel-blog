<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Asset;

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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'file' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $file = request()->file('file');

        //create new asset and save file to database
        $asset = Asset::create([
            'name' => $file->getClientOriginalName(),
        ]);
        $uniqueFilename = $asset->id . $file->getClientOriginalName();
        $file->storeAs('assets', $uniqueFilename);

        $user = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'asset_id' => $asset->id,
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        auth()->login($user);

        session()->flash('message', 'Welcome ' . $user->first_name . '! Thank you so much for signing up!');

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

        session()->flash('message', 'Welcome back, ' . auth()->user()->first_name . '!');

        return redirect()->home();
    }
}
