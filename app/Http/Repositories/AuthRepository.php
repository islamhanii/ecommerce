<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthInterface {
    public function index() {
        return view('login');
    }

    public function login($request) {
        $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required|min:8'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect(route('home'));
        }

        session()->flash('error', 'Invalid email or password');
        return redirect(route('loginPage'));
    }
}