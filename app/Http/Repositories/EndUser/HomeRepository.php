<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;

class HomeRepository implements HomeInterface {
    public function index() {
        return view('endUser.index');
    }
}