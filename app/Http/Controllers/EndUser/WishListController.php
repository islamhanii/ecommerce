<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\WishListInterface;
use App\Http\Requests\WishLists\AddWishListRequest;
use App\Http\Requests\WishLists\DeleteWishListRequest;

class WishListController extends Controller
{
    private $wishListInterface;

    public function __construct(WishListInterface $wishListInterface) {
        $this->wishListInterface = $wishListInterface;
    }

    public function index() {
        return $this->wishListInterface->index();
    }

    public function store(AddWishListRequest $request) {
        return $this->wishListInterface->store($request);
    }

    public function delete(DeleteWishListRequest $request) {
        return $this->wishListInterface->destroy($request);
    }
}
