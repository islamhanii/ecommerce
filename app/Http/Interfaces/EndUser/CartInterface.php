<?php

namespace App\Http\Interfaces\EndUser;

interface CartInterface {
    public function index();
    public function addToCart($request);
    public function deleteFromCart($request);
}