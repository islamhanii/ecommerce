<?php

namespace App\Http\Interfaces\EndUser;

interface ProfileInterface {
    public function index();
    public function update($request);
}