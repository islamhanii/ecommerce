@extends('endUser.layouts._profile')

@section('category')
    <div class="profile-wishlist">
        <div class="wishlist-area">
            <div class="wishlist-details">
                <div class="wishlist-item">
                    <span class="wishlist-head">My wishlist:</span>
                    <span class="wishlist-items">{{$wishlistsCount}} item</span>
                </div>
                @foreach($wishlists as $wishlist)
                    <div class="wishlist-all-pro">
                        <div class="wishlist-pro">
                            <div class="wishlist-pro-image">
                                <a href="{{route('product.details', [$wishlist->product_details->product->id, 'en'])}}"><img src="{{asset('uploads/' . $wishlist->product_details->image)}}" class="img-fluid" alt="image" style="max-width:210px"></a>
                            </div>
                            <div class="pro-details">
                                <h4><a href="{{route('product.details', [$wishlist->product_details->product->id, 'en'])}}">{{$wishlist->product_details->product->name}}</a></h4>
                                <span class="all-size">Size: <span class="pro-size">{{$wishlist->product_details->size->size}} {{$wishlist->product_details->size->size_unit->unit}}</span></span>
                                <a style="background-color:#{{$wishlist->product_details->color->hexa}}; width:50px; height:50px;"></a>
                            </div>
                        </div>
                        <div class="all-pro-price">
                            <span class="new-price">{{$wishlist->product_details->product->price}} EGP</span>
                            <span class="old-price"><del>$405.00 USD</del></span>
                            <form method="post" action="{{route('wishlist.delete')}}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="wish_list_id" value="{{$wishlist->id}}">
                                <button type="submit" style="font-size:20px; background-color:unset;"><span><i class="ion-android-close"></i></span></button>
                            </form>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>

    </div>
@endsection
