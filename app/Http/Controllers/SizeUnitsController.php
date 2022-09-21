<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SizeUnitsInterface;
use App\Http\Requests\SizeUnits\AddSizeUnitRequest;
use App\Http\Requests\SizeUnits\DeleteSizeUnitRequest;
use App\Http\Requests\SizeUnits\UpdateSizeUnitRequest;

class SizeUnitsController extends Controller
{
    private $sizeUnitsInterface;

    public function __construct(SizeUnitsInterface $sizeUnitsInterface) {
        $this->sizeUnitsInterface = $sizeUnitsInterface;
    }

    public function index() {
        return $this->sizeUnitsInterface->index();
    }

    public function create() {
        return $this->sizeUnitsInterface->create();
    }

    public function store(AddSizeUnitRequest $request) {
        return $this->sizeUnitsInterface->store($request);
    }

    public function edit($sizeUnitId) {
        return $this->sizeUnitsInterface->edit($sizeUnitId);
    }

    public function update(UpdateSizeUnitRequest $request) {
        return $this->sizeUnitsInterface->update($request);
    }

    public function delete(DeleteSizeUnitRequest $request) {
        return $this->sizeUnitsInterface->destroy($request);
    }
}
