<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AuthInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authInterface;

    public function __construct(AuthInterface $authInterface) {
        $this->authInterface = $authInterface;
    }

    public function index() {
        return $this->authInterface->index();
    }

    public function login(Request $request){
        return $this->authInterface->login($request);
    }
}
