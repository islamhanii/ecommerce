<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\WishListInterface;
use App\Http\Traits\ProductDetailsTrait;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\WishListTrait;
use App\Models\ProductDetail;
use App\Models\WishList;

class WishListRepository implements WishListInterface {
    use WishListTrait, ProductDetailsTrait;

    private $wishListModel, $productDetailsModel;

    /*-------------------------------------Constructor-----------------------------------*/
    public function __construct(WishList $wishListModel, ProductDetail $productDetailsModel) {
        $this->wishListModel = $wishListModel;
        $this->productDetailsModel = $productDetailsModel;
    }
    
    /*-------------------------------------Get WishList-----------------------------------*/
    public function index() {
        $wishlists = $this->getWishLists(['product_details.size.size_unit:id,unit', 'product_details.color:id,hexa', 'product_details.product:id']);
        $wishlistsCount = $wishlists->count();
        foreach($wishlists as $wishlist) {
            $wishlist->product_details->product->append('name');
        }
        
        return view('endUser.wishlist', compact('wishlists', 'wishlistsCount'));
    }

    /*-------------------------------------Add to WishList-----------------------------------*/
    public function store($request) {
        $productDetails = $this->getProductDetailsByAll($request->product_id, $request->size_id, $request->color_id);
        if(!$productDetails) {
            abort(404);
        }

        $wishlist = $this->getWishListWhere([
            ['product_details_id', $productDetails->id],
            ['user_id', auth()->user()->id]
        ]);

        if(!$wishlist) {
            $this->wishListModel->create([
                'user_id' => auth()->user()->id,
                'product_details_id' => $productDetails->id
            ]);
        }

        session()->flash('success', 'Product added to the wishlist successfully.');
        return redirect()->back();
    }

    /*-------------------------------------Remove from WishList-----------------------------------*/
    public function destroy($request) {
        $wishlist = $this->getWishListById($request->wish_list_id);
        $wishlist->delete();

        session()->flash('success', 'Product removed from the wishlist successfully.');
        return redirect(route('wishlist.index',['en']));
    }
}