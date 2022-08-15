<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;

class AuthRepository implements AuthInterface {
    public function index() {
        return view('login');
    }
}