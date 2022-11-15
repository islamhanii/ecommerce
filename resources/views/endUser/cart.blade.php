@extends('endUser.layouts.app')

@section('title')
    Vegist - Multipurpose eCommerce HTML Template
@endsection


@section('content')
<!--cart start-->
<section class="cart-page section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <div class="cart-total">
                    <div class="cart-price">
                        <span>Subtotal</span>
                        <span class="total">$<span id="price-total"></span> CAD</span>
                    </div>
                    <div class="cart-info">
                        <h4>Shipping info</h4>
                        <form>
                            <label>Country</label>
                            <select class="form-select" aria-label="Default select example">
                                <option>---</option>
                                <option>Afghanistan</option>
                                <option>Åland Islands</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                                <option>Andorra</option>
                                <option>Angola</option>
                                <option>Anguilla</option>
                                <option>Antigua &amp; Barbuda</option>
                                <option>Argentina</option>
                                <option>Armenia</option>
                                <option>Aruba</option>
                                <option>Ascension Island</option>
                                <option>Australia</option>
                                <option>Austria</option>
                                <option>Azerbaijan</option>
                                <option>Bahamas</option>
                                <option>Bahrain</option>
                            </select>
                            <label>Zip/postal code</label>
                            <input type="text" name="code" placeholder="Zip/postal code">
                        </form>
                        <a href="javascript:void(0)" class="btn btn-style1" style="width:100%; margin-top:20px;">Calculate</a>
                    </div>
                    <div class="shop-total">
                        <span>Total</span>
                        <span class="total-amount">$<span id="checkout-total"></span> CAD</span>
                    </div>
                    <a href="checkout-2.html" class="btn btn-style1"  style="width:100%; margin-top:20px;">Checkout</a>
                </div>
            </div>
            <div class="col-xl-9 col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <div class="cart-area">
                    <div class="cart-details">
                        <div class="cart-item">
                            <span class="cart-head">My cart:</span>
                            <span class="c-items"><span id="num-of-items">{{count($carts)}}</span> item</span>
                        </div>
                        @foreach ($carts as $count => $cart)
                        <div class="cart-all-pro">
                            <div class="cart-pro">
                                <div class="cart-pro-image">
                                    <a href="{{route('product.details', [$cart->details->product_id, 'en'])}}"><img src="{{asset('uploads/' . $cart->details->image)}}" class="img-fluid" alt="image"></a>
                                </div>
                                <div class="pro-details">
                                    <h4><a href="{{route('product.details', [$cart->details->product_id, 'en'])}}">{{$cart->details->name}}</a></h4>
                                    <span class="pro-size"><span class="size">Size:</span> {{$cart->details->size->size}}{{$cart->details->size->size_unit->unit}}</span>
                                    <span class="cart-pro-price">$<span id="price{{$count}}">{{$cart->details->price}}</span> CAD</span>
                                </div>
                            </div>
                            <div class="qty-item">
                                <div class="center">
                                    <div class="plus-minus">
                                        <span>
                                            <a href="javascript:void(0)" class="minus-btn text-black">-</a>
                                            <input type="text" name="value" value="{{$cart->count}}" id="items{{$count}}" onchange="changeBill({{$count}})" disabled>
                                            <input type="hidden" name="stock" value="{{$cart->details->stock}}" id="stock{{$count}}">
                                            <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                                        </span>
                                    </div>
                                    <form action="{{route('cart.delete')}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="cart_id" value="{{$cart->id}}">
                                        <button type="submit" class="pro-remove" style="background:none; margin:10px auto 0;">Remove</button>
                                    </form>
                                </div>
                            </div>
                            <div class="all-pro-price">
                                <span>$<span id="total{{$count}}"></span> CAD</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--cart end-->
@endsection

@section('additional-scripts')
<script src="{{asset('assetsEndUser/js/cart.js')}}"></script>
@endsection