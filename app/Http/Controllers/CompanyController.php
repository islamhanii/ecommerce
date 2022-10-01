<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CompanyInterface;
use App\Http\Requests\Companies\AddCompanyRequest;
use App\Http\Requests\Companies\DeleteCompanyRequest;
use App\Http\Requests\Companies\UpdateCompanyRequest;

class CompanyController extends Controller
{
    private $companyInterface;

    public function __construct(CompanyInterface $companyInterface) {
        $this->companyInterface = $companyInterface;
    }

    public function index() {
        return $this->companyInterface->index();
    }

    public function create() {
        return $this->companyInterface->create();
    }

    public function store(AddCompanyRequest $request) {
        return $this->companyInterface->store($request);
    }

    public function edit($companyId) {
        return $this->companyInterface->edit($companyId);
    }

    public function update(UpdateCompanyRequest $request) {
        return $this->companyInterface->update($request);
    }

    public function delete(DeleteCompanyRequest $request) {
        return $this->companyInterface->destroy($request);
    }
}
