<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\CartInterface;
use App\Http\Traits\CartTrait;
use App\Models\Cart;

class CartRepository implements CartInterface {
    use CartTrait;

    private $cartModel;

    /*-------------------------------------Constructor-----------------------------------*/
    public function __construct(Cart $cartModel) {
        $this->cartModel = $cartModel;
    }

    /*-------------------------------------get Carts-----------------------------------*/
    public function index() {
        $carts = $this->getCarts()->append('details');
        
        return view('endUser.cart', compact('carts'));
    }

    /*-------------------------------------Add Cart-----------------------------------*/
    public function addToCart($request) {
        $cart = $this->getCartWhere([
            ['product_details_id', request('product_details_id')],
            ['user_id', auth()->user()->id]
        ]);

        if($cart) {
            $cart->update([
                'count' => $request->quantity
            ]);
        }
        else {
            $this->cartModel->create([
                'user_id' => auth()->user()->id,
                'product_details_id' => request('product_details_id'),
                'count' => $request->quantity
            ]);
        }

        session('sucess', 'Product added to the cart successfully');
        return redirect()->back();
    }

    /*-------------------------------------Delete Cart-----------------------------------*/
    public function deleteFromCart($request) {
        $this->getCartById($request->cart_id)->delete();

        session('sucess', 'Product removed from the cart successfully');
        return redirect()->back();
    }
}