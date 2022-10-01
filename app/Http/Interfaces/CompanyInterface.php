<?php

namespace App\Http\Interfaces;

interface CompanyInterface {
    public function index();
    public function create();
    public function store($request);
    public function edit($companyId);
    public function update($request);
    public function destroy($request);
}