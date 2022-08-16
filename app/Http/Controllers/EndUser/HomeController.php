<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\HomeInterface;

class HomeController extends Controller
{
    private $homeInterface;

    public function __construct(HomeInterface $homeInterface) {
        $this->homeInterface = $homeInterface;
    }

    public function index() {
        return $this->homeInterface->index();
    }
}
