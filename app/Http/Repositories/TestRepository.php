<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\TestInterface;

class TestRepository implements TestInterface {
    public function test() {
        return response()->json(["hello there"]);
    }
}