<?php

namespace App\Http\Interfaces;

interface DetailInterface {
    public function index();
    public function create();
    public function store($request);
    public function edit($detailId);
    public function update($request);
    public function destroy($request);
}