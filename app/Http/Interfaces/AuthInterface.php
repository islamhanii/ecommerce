<?php

namespace App\Http\Interfaces;

interface AuthInterface {
    public function index();
    public function login($request);
}