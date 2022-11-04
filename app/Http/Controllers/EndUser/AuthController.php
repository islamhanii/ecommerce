<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\AuthInterface;
use App\Http\Requests\Authentication\AuthRequest;
use App\Http\Requests\Authentication\RegisterRequest;

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
    
    public function registerPage() {
        return $this->authInterface->registerPage();
    }
    
    public function register(RegisterRequest $request) {
        return $this->authInterface->register($request);
    }

    public function logout() {
        return $this->authInterface->logout();
    }
}
