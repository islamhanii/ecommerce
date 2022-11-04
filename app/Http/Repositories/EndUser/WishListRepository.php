<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\WishListInterface;
use App\Http\Traits\WishListTrait;
use App\Models\WishList;

class WishListRepository implements WishListInterface {
    use WishListTrait;

    private $wishListModel;

    /*-------------------------------------Constructor-----------------------------------*/
    public function __construct(WishList $wishListModel) {
        $this->wishListModel = $wishListModel;
    }
    
    /*-------------------------------------Get WishList-----------------------------------*/
    public function index() {
        $wishlists = $this->getWishLists();
        return view('endUser.wishlist', compact('wishlists'));
    }

    /*-------------------------------------Add to WishList-----------------------------------*/
    public function store($request) {

    }

    /*-------------------------------------Remove from WishList-----------------------------------*/
    public function destroy($request) {

    }
}