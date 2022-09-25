<?php

namespace App\Http\Interfaces;

interface ProductDetailsInterface {
    public function index();
    public function create();
    public function store($request);
    public function edit($productDetailsId);
    public function update($request);
    public function destroy($request);
}