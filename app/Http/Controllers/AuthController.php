<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AuthInterface;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    private $authInterface;

    public function __construct(AuthInterface $authInterface) {
        $this->authInterface = $authInterface;
    }

    public function index() {
        return $this->authInterface->index();
    }

    public function login(AuthRequest $request){
        return $this->authInterface->login($request);
    }

    public function logout() {
        return $this->authInterface->logout();
    }
}
