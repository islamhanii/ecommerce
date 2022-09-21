<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SizeInterface;
use App\Http\Requests\Sizes\AddSizeRequest;
use App\Http\Requests\Sizes\DeleteSizeRequest;
use App\Http\Requests\Sizes\UpdateSizeRequest;

class SizeController extends Controller
{
    private $sizeInterface;

    public function __construct(SizeInterface $sizeInterface) {
        $this->sizeInterface = $sizeInterface;
    }

    public function index() {
        return $this->sizeInterface->index();
    }

    public function create() {
        return $this->sizeInterface->create();
    }

    public function store(AddSizeRequest $request) {
        return $this->sizeInterface->store($request);
    }

    public function edit($sizeId) {
        return $this->sizeInterface->edit($sizeId);
    }

    public function update(UpdateSizeRequest $request) {
        return $this->sizeInterface->update($request);
    }

    public function delete(DeleteSizeRequest $request) {
        return $this->sizeInterface->destroy($request);
    }
}
