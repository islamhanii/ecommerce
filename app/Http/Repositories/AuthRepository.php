<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use Illuminate\Http\Request;

class AuthRepository implements AuthInterface {
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if(auth()->attempt($credentials)) {
            return redirect(route('admin.index'));
        }

        session()->flash('error', 'Invalid email or password.');
        return redirect(route('loginPage'));
    }

    public function logout() {
        session()->flush();
        auth()->logout();
        return redirect(route('home'));
    }
}