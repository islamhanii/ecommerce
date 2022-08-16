<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\HomeInterface;

class HomeRepository implements HomeInterface {
    public function index() {
        return view('admin.index');
    }
}