<?php

namespace App\Http\Traits;

trait CartTrait {
    private function getCarts($with = []) {
        return $this->cartModel->where('user_id', auth()->user()->id)->with($with)->get();
    }
    
    private function getCartById($cartId, $with = []) {
        return $this->cartModel->with($with)->findOrFail($cartId);
    }
    
    private function getCartWhere($where=[]) {
        return $this->cartModel->where($where)->first();
    }
}