@extends('endUser.layouts.app')

@section('title')
    Vegist - Multipurpose eCommerce HTML Template
@endsection


@section('content')
    <!-- breadcrumb start -->
    <section class="about-breadcrumb">
        <div class="about-back section-tb-padding" style="background-image: url(image/about-image.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="about-l">
                            <ul class="about-link">
                                <li class="go-home"><a href="index1.html">Home</a></li>
                                <li class="about-p"><span>Wishlist</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- order history start -->
    <section class="order-histry-area section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="order-history">
                        <div class="profile">
                            <div class="order-pro">
                                <div class="pro-img">
                                    <a href="javascript:void(0)"><img src="image/user-ava.jpg" alt="img" class="img-fluid"></a>
                                </div>
                                <div class="order-name">
                                    <h4>{{auth()->user()->name}}</h4>
                                    <span>Joined April 06, 2021</span>
                                </div>
                            </div>
                            <div class="order-his-page">
                                <ul class="profile-ul">
                                    <li class="profile-li"><a href="order-history.html"><span>Orders</span> <span class="pro-count">5</span></a></li>
                                    <li class="profile-li"><a href="profile.html">Profile</a></li>
                                    <li class="profile-li"><a href="pro-addresses.html">Address</a></li>
                                    <li class="profile-li"><a href="pro-wishlist.html" class="active"><span>Wishlist</span> <span class="pro-count">{{count($items)}}</span></a></li>
                                    <li class="profile-li"><a href="pro-tickets.html"><span>My tickets</span> <span class="pro-count">4</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="profile-wishlist">
                            <div class="wishlist-area">
                                <div class="wishlist-details">
                                    <div class="wishlist-item">
                                        <span class="wishlist-head">My wishlist:</span>
                                        <span class="wishlist-items">{{count($items)}} item</span>
                                    </div>
                                    @foreach($items as $item)
                                        <div class="wishlist-all-pro">
                                            <div class="wishlist-pro">
                                                <div class="wishlist-pro-image">
                                                    <a href="product.html"><img src="{{$item->detail['image']}}" class="img-fluid" alt="image"></a>
                                                </div>
                                                <div class="pro-details">
                                                    <h4><a href="product.html">{{$item->detail['productName']}}</a></h4>
                                                    <span class="all-size">Size: <span class="pro-size">{{$item->detail['size']}}</span></span>
                                                    <span class="wishlist-text">{{$item->detail['color']}}</span>
                                                </div>
                                            </div>
                                            <div class="qty-item">
                                                <a href="cart.html" class="add-wishlist">Add to cart</a>
                                                <a href="checkout-1.html" class="add-wishlist">Buy now</a>
                                            </div>
                                            <div class="all-pro-price">
                                                <span class="new-price">{{$item->detail['price']}} EGP</span>
{{--                                                <span class="old-price"><del>$405.00 USD</del></span>--}}
                                                <form method="post" action="{{route('wishlist.delete', [$item->id])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"><span><i class="ion-android-close"></i></span></button>
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
