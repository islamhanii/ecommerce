<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from spacingtech.com/html/vegist-final/vegist/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Oct 2021 13:51:54 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<!-- Head -->
@include('endUser.layouts.head')
<!-- End HEad -->
<body class="home-1">
<!-- top notificationbar start -->
<section class="top1">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="top-home">
                    <li class="top-home-li">
                        <!-- currency start -->
                        <div class="currency">
                            <span class="currency-head">currency:</span>
                            <div class="currency-drop">
                                <div class="eur">
                                    <img class="img-fluid" src="{{asset('assetsEndUser/image/c-icon1.png')}}" alt="">
                                    <span class="cur-name">EUR</span>
                                </div>
                                <ul class="all-currency">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img class="img-fluid" src="{{asset('assetsEndUser/image/c-icon4.png')}}" alt="">
                                            <span class="cur-name">AFN</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img class="img-fluid" src="{{asset('assetsEndUser/image/c-icon2.png')}}" alt="">
                                            <span class="cur-name">BDT</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img class="img-fluid" src="{{asset('assetsEndUser/image/c-icon3.png')}}" alt="">
                                            <span class="cur-name">CAD</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img class="img-fluid" src="{{asset('assetsEndUser/image/c-icon1.png')}}" alt="">
                                            <span class="cur-name">EUR</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img class="img-fluid" src="{{asset('assetsEndUser/image/c-icon5.png')}}" alt="">
                                            <span class="cur-name">GBP</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img class="img-fluid" src="{{asset('assetsEndUser/image/c-icon6.png')}}" alt="">
                                            <span class="cur-name">INR</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img class="img-fluid" src="{{asset('assetsEndUser/image/c-icon7.png')}}" alt="">
                                            <span class="cur-name">SAR</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img class="img-fluid" src="{{asset('assetsEndUser/image/c-icon8.png')}}" alt="">
                                            <span class="cur-name">USD</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- currency end -->
                        <!-- mobile search start -->
                        <div class="r-search">
                            <a href="#r-search-modal" class="search-popuup" data-bs-toggle="modal"><i class="fa fa-search"></i></a>
                            <div class="modal fade" id="r-search-modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="m-drop-search">
                                                <input type="text" name="search" placeholder="Search products, brands or advice">
                                                <button class="search-btn" type="button"><i class="fa fa-search"></i></button>
                                            </div>
                                            <button type="button" class="close" data-bs-dismiss="modal"><i class="ion-close-round"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- mobile search end -->
                    </li>
                    <li class="top-home-li t-content">
                        <!-- offer text start -->
                        <div class="top-content">
                            <p class="top-slogn"><span class="top-c">free shipping</span> orders from all item</p>
                        </div>
                        <!-- offer text end -->
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- top notificationbar end -->

<!-- header start -->
@include('endUser.layouts.header')
<!-- header end -->

<!-- mobile menu start -->
@include('endUser.layouts.header-mobile')
<!-- mobile menu end -->

<!--home page slider start-->
<section class="slider">
    <div class="home-slider owl-carousel owl-theme">
        <div class="items">
            <div class="img-back" style="background-image:url(image/slider1.jpg);">
                <div class="h-s-content slide-c-l">
                    <span>Summer vage sale</span>
                    <h1>Fresh fruits<br>&vegetable</h1>
                    <a href="grid-list.html" class="btn btn-style1">Shop now</a>
                </div>
            </div>
        </div>
        <div class="items">
            <div class="img-back" style="background-image:url(image/slider2.jpg);">
                <div class="h-s-content slide-c-r">
                    <span>Organic indian masala</span>
                    <h1>Prod of indian<br>100% pacaging</h1>
                    <a href="grid-list.html" class="btn btn-style1">Shop now</a>
                </div>
            </div>
        </div>
        <div class="items">
            <div class="img-back" style="background-image:url(image/slider3.jpg);">
                <div class="h-s-content slide-c-c">
                    <span>Top selling!</span>
                    <h1>Fresh for your health</h1>
                    <a href="grid-list.html" class="btn btn-style1">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--home page slider start-->
@yield('content')
<!-- Footer Start -->
@include('endUser.layouts.footer')
<!-- Footer End -->
<!-- newsletter pop-up start -->
<div class="vegist-popup animated modal fadeIn" id="myModal1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popup-content">
                    <!-- popup close button start -->
                    <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close" class="close-btn"><i class="ion-close-round"></i></a>
                    <!-- popup close button end -->
                    <!-- popup content area start -->
                    <div class="pop-up-newsletter" style="background-image: url(image/news-popup.jpg);">
                        <div class="logo-content">
                            <a href="{{route('home')}}"><img src="{{asset('assetsEndUser/image/logo1.png')}}" alt="image" class="img-fluid"></a>
                            <h4>Become a subscriber</h4>
                            <span>Subscribe to get the notification of latest posts</span>
                        </div>
                        <div class="subscribe-area">
                            <input type="text" name="comment" placeholder="Your email address">
                            <a href="{{route('home')}}" class="btn btn-style1">Subscribe</a>
                        </div>
                    </div>
                    <!-- popup content area end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- newsletter pop-up end -->
<!-- back to top start -->
<a href="javascript:void(0)" class="scroll" id="top">
    <span><i class="fa fa-angle-double-up"></i></span>
</a>
<!-- back to top end -->
<div class="mm-fullscreen-bg"></div>
@include('endUser.layouts.footer-script')
</body>
<!-- Mirrored from spacingtech.com/html/vegist-final/vegist/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Oct 2021 13:54:05 GMT -->
</html>
