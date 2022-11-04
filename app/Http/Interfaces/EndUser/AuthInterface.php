<?php

namespace App\Http\Interfaces\EndUser;

interface AuthInterface {
    public function index();
    public function login($request);
    public function registerPage();
    public function register($request);
    public function logout();
}