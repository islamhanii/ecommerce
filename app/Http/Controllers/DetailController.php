<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\DetailInterface;
use App\Http\Requests\Details\AddDetailRequest;
use App\Http\Requests\Details\DeleteDetailRequest;
use App\Http\Requests\Details\UpdateDetailRequest;

class DetailController extends Controller
{
    private $detailInterface;

    public function __construct(DetailInterface $detailInterface) {
        $this->detailInterface = $detailInterface;
    }

    public function index() {
        return $this->detailInterface->index();
    }

    public function create() {
        return $this->detailInterface->create();
    }

    public function store(AddDetailRequest $request) {
        return $this->detailInterface->store($request);
    }

    public function edit($detailId) {
    return $this->detailInterface->edit($detailId);
    }

    public function update(UpdateDetailRequest $request) {
        return $this->detailInterface->update($request);
    }

    public function delete(DeleteDetailRequest $request) {
        return $this->detailInterface->destroy($request);
    }
}
