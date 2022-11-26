@extends('endUser.layouts.app')

@section('title')
    Vegist - Multipurpose eCommerce HTML Template
@endsection


@section('content')
    <!-- profile start -->
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
                                    <li class="profile-li"><a href="{{route('profile.index')}}" class="{{Request::is('*profile*')?'active':''}}">Profile</a></li>
                                    <li class="profile-li"><a href="pro-addresses.html">Address</a></li>
                                    <li class="profile-li"><a href="{{route('wishlist.index', ['en'])}}" class="{{Request::is('*wishlist*')?'active':''}}"><span>Wishlist</span> <span class="pro-count">{{$wishlistsCount}}</span></a></li>
                                    <li class="profile-li"><a href="pro-tickets.html"><span>My tickets</span> <span class="pro-count">4</span></a></li>
                                </ul>
                            </div>
                        </div>
                        @yield('category')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile end -->
@endsection