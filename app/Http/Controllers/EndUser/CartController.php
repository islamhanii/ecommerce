<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\CartInterface;
use App\Http\Requests\Carts\AddCartRequest;
use App\Http\Requests\Carts\DeleteCartRequest;

class CartController extends Controller
{
    private $cartInterface;

    public function __construct(CartInterface $cartInterface) {
        $this->cartInterface = $cartInterface;
    }

    public function index() {
        return $this->cartInterface->index();
    }

    public function store(AddCartRequest $request) {
        return $this->cartInterface->addToCart($request);
    }

    public function delete(DeleteCartRequest $request) {
        return $this->cartInterface->deleteFromCart($request);
    }
}
