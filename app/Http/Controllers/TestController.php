<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\TestInterface;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $testInterface;

    public function __construct(TestInterface $testInterface) {
        $this->testInterface = $testInterface;
    }

    public function test() {
        return $this->testInterface->test();
    }
}
