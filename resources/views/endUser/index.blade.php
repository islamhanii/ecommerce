@extends('endUser.layouts.app')

@section('title')
    Vegist - Multipurpose eCommerce HTML Template
@endsection

@section('content')
    <!--banner start-->
    <section class="t-banner1 section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="home-offer-banner">
                        @foreach ($advertisements as $advertisement)
                            <div class="o-t-banner">
                                <a href="{{$advertisement->link}}" class="image-b">
                                    <img class="img-fluid" src="{{asset('uploads/'. $advertisement->image)}}" alt="banner image">
                                </a>
                                <div class="o-t-content">
                                    <h6>{{$advertisement->title}}</h6>
                                    <a href="{{$advertisement->link}}" class="btn btn-style1">Shop now</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner end -->
    <!-- Category image slide -->
    <section class="category-img1 section-t-padding section-b-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Shop by category</h2>
                    </div>
                    <div class="home-category owl-carousel owl-theme">
                        @foreach ($subCategories as $subCategory)
                            <div class="items">
                                <div class="h-cate">
                                    <div class="c-img">
                                        <a href="{{route('sub_category.products',[$subCategory->id, 'en'])}}" class="home-cate-img">
                                            <img class="img-fluid" src="{{asset('uploads/' . $subCategory->image)}}" alt="cate-image">
                                            <span class="cat-title">{{$subCategory->name}}</span>
                                        </a>
                                    </div>
                                    <span class="cat-num">{{$subCategory->products_count}} Items</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category image slide -->
    <!-- Trending Products Start -->
    <section class="h-t-products1 section-t-padding section-b-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Trending products</h2>
                    </div>
                    <div class="trending-products owl-carousel owl-theme">
                        @foreach ($products as $product)
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="{{route('product.details', [$product->id, 'en'])}}">
                                        <img class="img-fluid" src="{{asset('uploads/'. $product->main_image)}}" alt="pro-img1">
                                    </a>
                                </div>
                            </div>
                            <div class="caption">
                                <h3><a href="product.html">{{$product->name}}</a></h3>
                                <div class="pro-price">
                                    <span class="new-price">${{$product->price}} USD</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trending Products end -->
    <!-- brand logo start -->
    <section class="section-tb-padding home-brand1">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brand-carousel owl-carousel owl theme">
                        <div class="items">
                            <div class="brand-img">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assetsEndUser/image/brand/home-123/l1.png')}}" alt="home brand" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="items">
                            <div class="brand-img">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assetsEndUser/image/brand/home-123/l2.png')}}" alt="home brand" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="items">
                            <div class="brand-img">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assetsEndUser/image/brand/home-123/l3.png')}}" alt="home brand" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="items">
                            <div class="brand-img">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assetsEndUser/image/brand/home-123/l4.png')}}" alt="home brand" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="items">
                            <div class="brand-img">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assetsEndUser/image/brand/home-123/l5.png')}}" alt="home brand" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="items">
                            <div class="brand-img">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assetsEndUser/image/brand/home-123/l6.png')}}" alt="home brand" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="items">
                            <div class="brand-img">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assetsEndUser/image/brand/home-123/l7.png')}}" alt="home brand" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="items">
                            <div class="brand-img">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assetsEndUser/image/brand/home-123/l8.png')}}" alt="home brand" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- brand logo end -->
@endsection
