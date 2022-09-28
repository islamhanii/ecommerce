<?php

namespace App\Http\Interfaces;

interface AboutInterface {
    public function index();
    public function create();
    public function store($request);
    public function edit($aboutId);
    public function update($request);
    public function destroy($request);
}