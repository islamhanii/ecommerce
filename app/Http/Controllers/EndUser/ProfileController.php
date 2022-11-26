<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\ProfileInterface;
use App\Http\Requests\Profile\UpdateProfileRequest;

class ProfileController extends Controller
{
    private $profileInterface;

    public function __construct(ProfileInterface $profileInterface) {
        $this->profileInterface = $profileInterface;
    }

    public function index() {
        return $this->profileInterface->index();
    }

    public function update(UpdateProfileRequest $request) {
        return $this->profileInterface->update($request);
    }
}
