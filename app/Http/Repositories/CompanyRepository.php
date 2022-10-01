<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CompanyInterface;
use App\Http\Traits\CompanyTrait;
use App\Http\Traits\ImageStorage;
use App\Models\Company;

class CompanyRepository implements CompanyInterface {
    use CompanyTrait, ImageStorage;

    private $companyModel;

    /*-------------------------------------Constructor-----------------------------------*/
    public function __construct(Company $companyModel) {
        $this->companyModel = $companyModel;
    }

    /*-------------------------------------Get All Companies-----------------------------------*/
    public function index() {
        $companies = $this->getCompanies();

        return view('admin.companies.index', compact('companies'));
    }

    /*-------------------------------------create Company-----------------------------------*/
    public function create() {
        return view('admin.companies.create');
    }

    public function store($request) {
        $path = $this->uploadImage($request, 'companies');

        $this->companyModel->create([
            'image' => $path,
            'sort'  => $request->sort
        ]);

        session()->flash('success'. 'Company created successfully');
        return redirect(route('companies.index'));
    }

    /*-------------------------------------Update Company-----------------------------------*/
    public function edit($companyId) {
        $company = $this->getCompanyById($companyId);

        return view('admin.companies.edit', compact('company'));
    }

    public function update($request) {
        $company = $this->getCompanyById($request->company_id);

        $path = $this->uploadImage($request, 'companies', $company);

        $company->update([
            'image' => $path,
            'sort'  => $request->sort
        ]);

        session()->flash('success'. 'Company updated successfully');
        return redirect(route('companies.index'));
    }

    /*-------------------------------------Delete Company-----------------------------------*/
    public function destroy($request) {
        $company = $this->getCompanyById($request->company_id);

        $company->delete();
        $this->deleteImage($company->image);

        session()->flash('success'. 'Company deleted successfully');
        return redirect(route('companies.index'));
    }
}