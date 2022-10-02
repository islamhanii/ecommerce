<?php

namespace App\Http\Interfaces;

interface PolicyCategoryInterface {
    public function index();
    public function create();
    public function store($request);
    public function edit($policyCategoryId);
    public function update($request);
    public function destroy($request);
}