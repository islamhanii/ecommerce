<?php

namespace App\Http\Traits;

trait WishListTrait {
    private function getWishLists()
    {
        return $this->wishListModel->where('user_id', auth()->user()->id)->get();
    }
    
    private function getWishListFromWishList($wishListId)
    {
        return $this->wishListModel->findOrFail($wishListId);
    }
}