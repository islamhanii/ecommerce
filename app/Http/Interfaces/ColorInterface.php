<?php

namespace App\Http\Interfaces;

interface ColorInterface {
    public function index();
    public function create();
    public function store($request);
    public function edit($colorId);
    public function update($request);
    public function destroy($request);
}