<?php

namespace App\Http\Interfaces;

interface SizeUnitsInterface {
    public function index();
    public function create();
    public function store($request);
    public function edit($sizeUnitId);
    public function update($request);
    public function destroy($request);
}