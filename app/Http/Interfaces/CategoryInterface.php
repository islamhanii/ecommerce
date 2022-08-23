<?php

namespace App\Http\Interfaces;

interface CategoryInterface {
    public function index();
    public function create();
    public function store($request);
    public function edit($categoryId);
    public function update($request);
    public function destroy($request);
}