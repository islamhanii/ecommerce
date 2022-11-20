<?php

namespace App\Http\Traits;

trait WishListTrait {
    private function getWishLists($with=[])
    {
        return $this->wishListModel->where('user_id', auth()->user()->id)->with($with)->get();
    }
    
    private function getWishListById($wishListId)
    {
        return $this->wishListModel->findOrFail($wishListId);
    }
    
    private function getWishListWhere($where=[])
    {
        return $this->wishListModel->where($where)->first();
    }
}