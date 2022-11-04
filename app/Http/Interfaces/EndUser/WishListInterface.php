<?php

namespace App\Http\Interfaces\EndUser;

interface WishListInterface {
    public function index();
    public function store($request);
    public function destroy($request);
}