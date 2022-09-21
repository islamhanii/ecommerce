<?php

namespace App\Http\Interfaces;

interface SizeInterface {
    public function index();
    public function create();
    public function store($request);
    public function edit($sizeId);
    public function update($request);
    public function destroy($request);
}