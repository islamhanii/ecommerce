@extends('endUser.layouts.app')

@section('title')
    Vegist - Multipurpose eCommerce HTML Template
@endsection


@section('content')
    <!-- order history start -->
    <section class="order-histry-area section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="order-history">
                        <div class="profile">
                            <div class="order-pro">
                                <div class="order-name">
                                    <h4>{{auth()->user()->name}}</h4>
                                    <span>Joined {{date('F d, Y', strtotime(auth()->user()->created_at))}}</span>
                                </div>
                            </div>
                            <div class="order-his-page">
                                <ul class="profile-ul">
                                    <li class="profile-li"><a href="order-history.html"><span>Orders</span> <span class="pro-count">5</span></a></li>
                                    <li class="profile-li"><a href="profile.html">Profile</a></li>
                                    <li class="profile-li"><a href="pro-addresses.html">Address</a></li>
                                    <li class="profile-li"><a href="{{route('wishlist.index', ['en'])}}" class="{{ Request::is('*wishlist*')?'active':''}}"><span>Wishlist</span> <span class="pro-count">{{count($wishlists)}}</span></a></li>
                                    <li class="profile-li"><a href="pro-tickets.html"><span>My tickets</span> <span class="pro-count">4</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="profile-wishlist">
                            <div class="wishlist-area">
                                <div class="wishlist-details">
                                    <div class="wishlist-item">
                                        <span class="wishlist-head">My wishlist:</span>
                                        <span class="wishlist-items">{{count($wishlists)}} item</span>
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
                                                    <a style="background-color:{{$wishlist->product_details->color->hexa}}; width:50px; height:50px;"></a>
                                                </div>
                                            </div>
                                            <div class="qty-item">
                                                <a href="cart.html" class="add-wishlist">Add to cart</a>
                                                <a href="checkout-1.html" class="add-wishlist">Buy now</a>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order history end -->
@endsection
