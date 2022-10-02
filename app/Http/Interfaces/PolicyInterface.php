<?php

namespace App\Http\Interfaces;

interface PolicyInterface {
    public function index();
    public function create();
    public function store($request);
    public function edit($policyId);
    public function update($request);
    public function destroy($request);
}