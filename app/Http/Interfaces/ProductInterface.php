<?php

namespace App\Http\Interfaces;

interface ProductInterface {
    public function index();
    public function create();
    public function store($request);
}