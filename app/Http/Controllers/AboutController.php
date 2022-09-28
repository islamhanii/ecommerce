<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AboutInterface;
use App\Http\Requests\Abouts\AddAboutRequest;
use App\Http\Requests\Abouts\DeleteAboutRequest;
use App\Http\Requests\Abouts\UpdateAboutRequest;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $aboutInterface;

    public function __construct(AboutInterface $aboutInterface) {
        $this->aboutInterface = $aboutInterface;
    }

    public function index() {
        return $this->aboutInterface->index();
    }

    public function create() {
        return $this->aboutInterface->create();
    }

    public function store(AddAboutRequest $request) {
        return $this->aboutInterface->store($request);
    }

    public function edit($aboutId) {
        return $this->aboutInterface->edit($aboutId);
    }

    public function update(UpdateAboutRequest $request) {
        return $this->aboutInterface->update($request);
    }

    public function delete(DeleteAboutRequest $request) {
        return $this->aboutInterface->destroy($request);
    }
}
