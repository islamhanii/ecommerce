@extends('endUser.layouts.app')

@section('title')
    Vegist - Multipurpose eCommerce HTML Template
@endsection

@section('content')
<!-- product info start -->
<section class="section-tb-padding pro-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-12 col-md-12 col-xs-12 pro-image">
                <div class="row">
                    <div class="col-lg-6 col-xl-6 col-md-6 col-12 col-xs-12 larg-image">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="image-{{$product->id}}">
                                <a href="javascript:void(0)" class="long-img">
                                    <figure class="zoom" onmousemove="zoom(event)" style="background-image: url({{asset('uploads/' . $product->main_image)}})">
                                        <img src="{{asset('uploads/' . $product->main_image)}}" class="img-fluid" alt="image">
                                    </figure>
                                </a>
                            </div>
                            @if(count($product->product_details)>0)
                            @foreach($product->product_details as $product_detail)
                                <div class="tab-pane" id="image-{{$product->id}}{{$product_detail->id}}">
                                    <a href="javascript:void(0)" class="long-img">
                                        <figure class="zoom" onmousemove="zoom(event)" style="background-image: url({{asset('uploads/' . $product_detail->image)}})">
                                            <img src="{{asset('uploads/' . $product_detail->image)}}" class="img-fluid" alt="image">
                                        </figure>
                                    </a>
                                </div>
                            @endforeach
                            @endif
                        </div>
                        <ul class="nav nav-tabs pro-page-slider owl-carousel owl-theme">
                            <li class="nav-item items">
                                <a class="nav-link active" data-bs-toggle="tab" href="#image-{{$product->id}}"><img src="{{asset('uploads/' . $product->main_image)}}" class="img-fluid" alt="image"></a>
                            </li>
                            @if(count($product->product_details)>0)
                            @foreach($product->product_details as $product_detail)
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-{{$product->id}}{{$product_detail->id}}"><img src="{{asset('uploads/' . $product_detail->image)}}" class="img-fluid" alt="image"></a>
                                </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-md-6 col-12 col-xs-12 pro-info">
                        <h4>{{$product->name}}</h4>

                        <div class="pro-availabale">
                            <span class="available">Availability:</span>
                            <span class="pro-instock" id="stock-message"></span>
                        </div>
                        <div class="pro-price">
                            <span class="new-price">${{$product->price}}</span>
                            <span class="old-price"><del>$200.00 CAD</del></span>
                            <div class="Pro-lable">
                                <span class="p-discount">-8%</span>
                            </div>
                        </div>
                        <p>{!!$product->description!!}</p>

                        <div class="pro-items">
                            <span class="pro-size">Size:</span>
                            <ul class="pro-wight" id="product-sizes">
                                <?php $count = 0;?>
                                @if(count($product->sizes)>0)
                                @foreach($product->sizes as $size)
                                    <li><a class="{{($count++ == 0)? 'active' : ''}}" aria-valuenow="{{$size->id}}" onclick="sizesToggle(this)">{{$size->size}} {{$size->unit}}</a></li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="product-color">
                            <span class="color-label">Color:</span>
                            <span class="color" id="size-colors">
                            </span>
                        </div>
                        <div class="pro-qty">
                            <span class="qty">Quantity:</span>
                            <div class="plus-minus">
                                <span>
                                    <a href="javascript:void(0)" class="minus-btn text-black">-</a>
                                    <input type="text" name="value" value="" id="value" disabled>
                                    <input type="hidden" name="stock" value="" id="stock">
                                    <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                                </span>
                            </div>
                        </div>
                        <div class="pro-btn">
                            <form action="" method="post" style="display:none" id="product-form">
                                @csrf
                                <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                                <input type="hidden" name="size_id" id="form-size-id">
                                <input type="hidden" name="color_id" id="form-color-id">
                                <input type="hidden" name="quantity" id="form-quantity">
                            </form>
                            <button  class="btn btn-style1" aria-valuenow="{{route('wishlist.store')}}" onclick="submitForm(this)"><i class="fa fa-heart"></i></button>
                            <button  class="btn btn-style1" aria-valuenow="{{route('cart.store')}}" onclick="submitForm(this)"><i class="fa fa-shopping-bag"></i> Add to cart</button>
                            <a href="checkout-1.html" class="btn btn-style1">Buy now</a>
                        </div>
                        <div class="share">
                            <span class="share-lable">Share:</span>
                            <ul class="share-icn">
                                <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="pay-img">
                            <a href="checkout-1.html">
                                <img src="image/pay-image.jpg" class="img-fluid" alt="pay-image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 col-xs-12 pro-shipping">
                <div class="product-service">
                    <div class="icon-title">
                        <span><i class="ti-truck"></i></span>
                        <h4>Delivery info</h4>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting the printing and typesetting industry.</p>
                </div>
                <div class="product-service">
                    <div class="icon-title">
                        <span><i class="ti-reload"></i></span>
                        <h4>30 days returns</h4>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting the printing and typesetting industry.</p>
                </div>
                <div class="product-service">
                    <div class="icon-title">
                        <span><i class="ti-id-badge"></i></span>
                        <h4>10 year warranty</h4>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting the printing and typesetting industry.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product info end -->
<!-- releted product start -->
<section class="section-b-padding pro-releted">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
                <div class="releted-products owl-carousel owl-theme">
                    <div class="items">
                        <div class="tred-pro">
                            <div class="tr-pro-img">
                                <a href="product.html">
                                    <img class="img-fluid" src="image/pro/pro-img-1.jpg" alt="pro-img1">
                                    <img class="img-fluid additional-image" src="image/pro/pro-img-01.jpg" alt="additional image">
                                </a>
                            </div>
                            <div class="Pro-lable">
                                <span class="p-text">New</span>
                            </div>
                            <div class="pro-icn">
                                <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h3><a href="product.html">Fresh organic fruit (50gm)</a></h3>
                            <div class="rating">
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">$130.00 USD</span>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="tred-pro">
                            <div class="tr-pro-img">
                                <a href="product.html">
                                    <img class="img-fluid" src="image/pro/pro-img-2.jpg" alt="pro-img1">
                                    <img class="img-fluid additional-image" src="image/pro/pro-img-02.jpg" alt="additional image">
                                </a>
                            </div>
                            <div class="Pro-lable">
                                <span class="p-text">New</span>
                            </div>
                            <div class="pro-icn">
                                <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h3><a href="product.html">Fresh & healty food</a></h3>
                            <div class="rating">
                                <i class="fa fa-star e-star"></i>
                                <i class="fa fa-star e-star"></i>
                                <i class="fa fa-star e-star"></i>
                                <i class="fa fa-star e-star"></i>
                                <i class="fa fa-star e-star"></i>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">$126.00 USD</span>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="tred-pro">
                            <div class="tr-pro-img">
                                <a href="product.html">
                                    <img class="img-fluid" src="image/pro/pro-img-3.jpg" alt="pro-img1">
                                    <img class="img-fluid additional-image" src="image/pro/pro-img-03.jpg" alt="additional image">
                                </a>
                            </div>
                            <div class="Pro-lable">
                                <span class="p-discount">-20%</span>
                            </div>
                            <div class="pro-icn">
                                <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h3><a href="product.html">Fresh apple</a></h3>
                            <div class="rating">
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">$130.00 USD</span>
                                <span class="old-price"><del>$150.00 USD</del></span>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="tred-pro">
                            <div class="tr-pro-img">
                                <a href="product.html">
                                    <img class="img-fluid" src="image/pro/pro-img-4.jpg" alt="pro-img1">
                                    <img class="img-fluid additional-image" src="image/pro/pro-img-04.jpg" alt="additional image">
                                </a>
                            </div>
                            <div class="Pro-lable">
                                <span class="p-text">New</span>
                            </div>
                            <div class="pro-icn">
                                <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h3><a href="product.html">Fresh litchi 100% organic</a></h3>
                            <div class="rating">
                                <i class="fa fa-star e-star"></i>
                                <i class="fa fa-star e-star"></i>
                                <i class="fa fa-star e-star"></i>
                                <i class="fa fa-star e-star"></i>
                                <i class="fa fa-star e-star"></i>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">$117.00 USD</span>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="tred-pro">
                            <div class="tr-pro-img">
                                <a href="product.html">
                                    <img class="img-fluid" src="image/pro/pro-img-5.jpg" alt="pro-img1">
                                    <img class="img-fluid additional-image" src="image/pro/pro-img-05.jpg" alt="additional image">
                                </a>
                            </div>
                            <div class="Pro-lable">
                                <span class="p-discount">-12%</span>
                            </div>
                            <div class="pro-icn">
                                <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h3><a href="product.html">Vegetable tomato fresh</a></h3>
                            <div class="rating">
                                <i class="fa fa-star b-star"></i>
                                <i class="fa fa-star b-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">$133.00 USD</span>
                                <span class="old-price"><del>$145.00 USD</del></span>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="tred-pro">
                            <div class="tr-pro-img">
                                <a href="product.html">
                                    <img class="img-fluid" src="image/pro/pro-img-6.jpg" alt="pro-img1">
                                    <img class="img-fluid additional-image" src="image/pro/pro-img-06.jpg" alt="additional image">
                                </a>
                            </div>
                            <div class="Pro-lable">
                                <span class="p-discount">-21%</span>
                            </div>
                            <div class="pro-icn">
                                <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h3><a href="product.html">Natural grassbean</a></h3>
                            <div class="rating">
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">$139.00 USD</span>
                                <span class="old-price"><del>$160.00 USD</del></span>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="tred-pro">
                            <div class="tr-pro-img">
                                <a href="product.html">
                                    <img class="img-fluid" src="image/pro/pro-img-7.jpg" alt="pro-img1">
                                    <img class="img-fluid additional-image" src="image/pro/pro-img-07.jpg" alt="additional image">
                                </a>
                            </div>
                            <div class="Pro-lable">
                                <span class="p-discount">-10%</span>
                            </div>
                            <div class="pro-icn">
                                <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h3><a href="product.html">Fresh dryed almod (50gm)</a></h3>
                            <div class="rating">
                                <i class="fa fa-star e-star"></i>
                                <i class="fa fa-star e-star"></i>
                                <i class="fa fa-star e-star"></i>
                                <i class="fa fa-star e-star"></i>
                                <i class="fa fa-star e-star"></i>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">$580.00 USD</span>
                                <span class="old-price"><del>$590.00 USD</del></span>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="tred-pro">
                            <div class="tr-pro-img">
                                <a href="product.html">
                                    <img class="img-fluid" src="image/pro/pro-img-8.jpg" alt="pro-img1">
                                    <img class="img-fluid additional-image" src="image/pro/pro-img-08.jpg" alt="additional image">
                                </a>
                            </div>
                            <div class="Pro-lable">
                                <span class="p-text">New</span>
                            </div>
                            <div class="pro-icn">
                                <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h3><a href="product.html">Orange juice (5ltr)</a></h3>
                            <div class="rating">
                                <i class="fa fa-star b-star"></i>
                                <i class="fa fa-star b-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">$93.00 USD</span>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="tred-pro">
                            <div class="tr-pro-img">
                                <a href="product.html">
                                    <img class="img-fluid" src="image/pro/pro-img-9.jpg" alt="pro-img1">
                                    <img class="img-fluid additional-image" src="image/pro/pro-img-09.jpg" alt="additional image">
                                </a>
                            </div>
                            <div class="Pro-lable">
                                <span class="p-discount">-12%</span>
                            </div>
                            <div class="pro-icn">
                                <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h3><a href="product.html">Organic coconet (5ltr) juice</a></h3>
                            <div class="rating">
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">$167.00 USD</span>
                                <span class="old-price"><del>$179.00 USD</del></span>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="tred-pro">
                            <div class="tr-pro-img">
                                <a href="product.html">
                                    <img class="img-fluid" src="image/pro/pro-img-10.jpg" alt="pro-img1">
                                    <img class="img-fluid additional-image" src="image/pro/pro-img-010.jpg" alt="additional image">
                                </a>
                            </div>
                            <div class="Pro-lable">
                                <span class="p-text">New</span>
                            </div>
                            <div class="pro-icn">
                                <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h3><a href="product.html">Shrimp jumbo (5Lb)</a></h3>
                            <div class="rating">
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">$230.00 USD</span>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="tred-pro">
                            <div class="tr-pro-img">
                                <a href="product.html">
                                    <img class="img-fluid" src="image/pro/pro-img-11.jpg" alt="pro-img1">
                                    <img class="img-fluid additional-image" src="image/pro/pro-img-011.jpg" alt="additional image">
                                </a>
                            </div>
                            <div class="Pro-lable">
                                <span class="p-text">New</span>
                            </div>
                            <div class="pro-icn">
                                <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h3><a href="product.html">Sp.red fresh guava</a></h3>
                            <div class="rating">
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">$45.00 USD</span>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="tred-pro">
                            <div class="tr-pro-img">
                                <a href="product.html">
                                    <img class="img-fluid" src="image/pro/pro-img-12.jpg" alt="pro-img1">
                                    <img class="img-fluid additional-image" src="image/pro/pro-img-012.jpg" alt="additional image">
                                </a>
                            </div>
                            <div class="Pro-lable">
                                <span class="p-discount">-25%</span>
                            </div>
                            <div class="pro-icn">
                                <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h3><a href="product.html">Fresh mussel (500g)</a></h3>
                            <div class="rating">
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">$245.00 USD</span>
                                <span class="old-price"><del>$270.00 USD</del></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- releted product end -->
<!-- quick veiw start -->
<section class="quick-view">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product quickview</h5>
                    <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close"><i class="ion-close-round"></i></a>
                </div>
                <div class="quick-veiw-area">
                    <div class="quick-image">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="image-1">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="image/pro-page-image/pro-page-image.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-2">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="image/pro-page-image/prro-page-image01.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-3">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="image/pro-page-image/pro-page-image1-1.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-4">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="image/pro-page-image/pro-page-image1.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-5">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="image/pro-page-image/pro-page-image2.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-6">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="image/pro-page-image/pro-page-image2-2.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-7">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="image/pro-page-image/pro-page-image3.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-8">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="image/pro-page-image/pro-page-image03.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                        </div>
                        <ul class="nav nav-tabs quick-slider owl-carousel owl-theme">
                            <li class="nav-item items">
                                <a class="nav-link active" data-bs-toggle="tab" href="#image-1"><img src="image/pro-page-image/image1.jpg" class="img-fluid" alt="image"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-2"><img src="image/pro-page-image/image2.jpg" class="img-fluid" alt="iamge"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-3"><img src="image/pro-page-image/image3.jpg" class="img-fluid" alt="image"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-4"><img src="image/pro-page-image/image4.jpg" class="img-fluid" alt="image"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-5"><img src="image/pro-page-image/image5.jpg" class="img-fluid" alt="image"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-6"><img src="image/pro-page-image/image6.jpg" class="img-fluid" alt="image"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-7"><img src="image/pro-page-image/image8.jpg" class="img-fluid" alt="image"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-8"><img src="image/pro-page-image/image7.jpg" class="img-fluid" alt="image"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="quick-caption">
                        <h4>Fresh organic reachter</h4>
                        <div class="quick-price">
                            <span class="new-price">$350.00 USD</span>
                            <span class="old-price"><del>$399.99 USD</del></span>
                        </div>
                        <div class="quick-rating">
                            <i class="fa fa-star c-star"></i>
                            <i class="fa fa-star c-star"></i>
                            <i class="fa fa-star c-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="pro-description">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and</p>
                        </div>
                        <div class="pro-size">
                            <label>Size: </label>
                            <select>
                                <option>1 ltr</option>
                                <option>3 ltr</option>
                                <option>5 ltr</option>
                            </select>
                        </div>
                        <div class="plus-minus">
                            <span>
                                <a href="javascript:void(0)" class="minus-btn text-black">-</a>
                                <input type="text" name="name" value="1">
                                <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                            </span>
                            <a href="cart.html" class="quick-cart"><i class="fa fa-shopping-bag"></i></a>
                            <a href="wishlist.html" class="quick-wishlist"><i class="fa fa-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- quick veiw end -->
@endsection

@section('additional-scripts')
<script src="{{asset('assetsEndUser/js/creator.js')}}"></script>
<script src="{{asset('assetsEndUser/js/loader.js')}}"></script>
<script src="{{asset('assetsEndUser/js/listener.eventer.js')}}"></script>
<script src="{{asset('assetsEndUser/js/form.js')}}"></script>
@endsection
