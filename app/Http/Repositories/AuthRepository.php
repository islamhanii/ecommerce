<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;

class AuthRepository implements AuthInterface {

    /*-------------------------------------Admin Login-----------------------------------*/
    public function index() {
        return view('login');
    }
    
    public function login($request) {
        $credentials = $request->only('email', 'password');
        if(auth()->attempt($credentials)) {
            return redirect(route('admin.index'));
        }
        
        session()->flash('error', 'Invalid email or password.');
        return redirect(route('loginPage'));
    }

    /*-------------------------------------Admin Logout-----------------------------------*/
    public function logout() {
        session()->flush();
        auth()->logout();
        return redirect(route('home'));
    }
}