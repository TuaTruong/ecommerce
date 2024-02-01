@props(['sliders'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="/"><img src="{{ asset('frontend/images/logo.png') }}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="/login-checkout"><i class="fa fa-user"></i> Tài khoản</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                                @auth
                                    <li><a href="/checkout"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                @else
                                    <li><a href="/login-checkout"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                @endauth
                                <li><a href="/gio-hang"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                @auth
                                    <li><a href="/logout-user"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                                @else
                                    <li><a href="/login-checkout"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="/trang-chu" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li><a href="404.html">Giỏ hàng</a></li>
                                <li><a href="contact-us.html">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <form action="#" method="GET">
                                <input type="text" name="search" placeholder="Search"
                                    value="{{ request('search') }}" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" style="height: 600px">
                            {{-- <p>{{$sliders}}</p> --}}
                            @foreach ($sliders as $key => $slide)
                                <div class="item {{$key==0 ? 'active' : ''}}">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>Free E-Commerce Template</h2>
                                        <p>{{$slide->desc}} </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src='/uploads/sliders/{{$slide->image}}'
                                            class="girl img-responsive" alt="" height="120" width="500"/>
                                    </div>
                                </div>
                            @endforeach


                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach ($categories as $category)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a
                                                href="/danh-muc-san-pham/{{ $category->id }}">{{ $category->name }} ({{$categories->count()}})</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--/category-products-->

                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach ($brands as $brand)
                                        <li><a href="/thuong-hieu-san-pham/{{ $brand->id }}"> {{ $brand->name }} ({{$brands->count()}})</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </section>

    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>e</span>-shopper</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ asset('frontend/images/iframe1.png') }}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ asset('frontend/images/iframe2.png') }}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ asset('frontend/images/iframe3.png') }}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ asset('frontend/images/iframe4.png') }}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{ asset('frontend/images/map.png') }}" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer><!--/Footer-->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".send_order").click(function() {
                let shipping_email = $(".shipping_email").val();
                let shipping_name = $(".shipping_name").val();
                let shipping_address = $(".shipping_address").val();
                let shipping_phone = $(".shipping_phone").val();
                let shipping_notes = $(".shipping_notes").val();
                let shipping_method = $(".payment_select").val();
                let shipping_fee = $(".shipping_fee").val();
                let order_coupon = $(".order_coupon").val();
                let _token = $('input[name="_token"]').val();
                Swal.fire({
                    title: "Bạn có chắc chắn muốn đặt hàng không",
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: "Có",
                    denyButtonText: `Không`
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/confirm-order",
                            method: "POST",
                            data: {
                                shipping_email: shipping_email,
                                shipping_name: shipping_name,
                                shipping_address: shipping_address,
                                shipping_phone: shipping_phone,
                                shipping_notes: shipping_notes,
                                shipping_fee: shipping_fee,
                                shipping_method: shipping_method,
                                order_coupon: order_coupon,
                                _token: _token
                            },
                            success: function(data) {
                                Swal.fire("Đặt đơn thành công!", "", "success");
                            },
                            error: function(data, textStatus, errorThrown) {
                                console.log(data);

                            },
                        })
                    } else {
                        Swal.fire("Xác nhận hủy", "", "info");
                    }
                });

            })

            $(".choose").on("change", function() {
                let action = $(this).attr("id");
                let ma_id = $(this).val();
                let _token = $('input[name="_token"]').val();
                let result = "";
                if (action == "city") {
                    result = "province";
                } else {
                    result = "ward";
                }


                $.ajax({
                    url: "/select-delivery",
                    method: "POST",
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $("#" + result).html(data)
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(data);

                    },
                })
            })
            $(".calculate_delivery").click(function() {
                let shipping_email = $(".shipping_email").val();
                let shipping_name = $(".shipping_name").val();
                let shipping_address = $(".shipping_address").val();
                let shipping_phone = $(".shipping_phone").val();
                let shipping_notes = $(".shipping_notes").val();
                let shipping_method = $(".payment_select").val();

                let matp = $(".city").val();
                let maqh = $(".province").val();
                let xaid = $(".ward").val();
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "/calculate-fee",
                    method: "POST",
                    data: {
                        shipping_method: shipping_method,
                        shipping_email: shipping_email,
                        shipping_name: shipping_name,
                        shipping_address: shipping_address,
                        shipping_phone: shipping_phone,
                        shipping_notes: shipping_notes,
                        matp: matp,
                        maqh: maqh,
                        xaid: xaid,
                        _token: _token
                    },
                    success: function(data) {
                        $(".feeship_container").html(data);
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(data);

                    },
                })
            })
            $(".feeship_delete").click(function() {
                $.ajax({
                    url: "/delete-fee",
                    method: "GET",
                    success: function(data) {
                        $(".feeship_container").html("Phí vận chuyển");
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(data);

                    },
                })
            })

            $(".add-to-cart").click(function() {
                let id = $(this).data("id_pro");
                let cart_product_name = $(".cart_product_name_" + id).val();
                let cart_product_image = $(".cart_product_image_" + id).val();
                let cart_product_price = $(".cart_product_price_" + id).val();
                let cart_product_qty = $(".cart_product_qty_" + id).val();
                let product_storage_qty = $(".product_storage_qty_" + id).val();
                let _token = $('input[name="_token"]').val();
                if(parseInt(product_storage_qty)<parseInt(cart_product_qty)){
                    alert("Làm ơn đặt số lượng nhỏ hơn " + product_storage_qty);
                } else{
                    $.ajax({
                        url: "/add-cart-ajax",
                        method: "POST",
                        data: {
                            id: id,
                            name: cart_product_name,
                            image: cart_product_image,
                            price: cart_product_price,
                            storage_qty: product_storage_qty,
                            qty: cart_product_qty,
                            _token: _token
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Thêm sản phẩm vào giỏ hàng thành công",
                                icon: "question",
                                iconHtml: "؟",
                                confirmButtonText: "Đi đến giỏ hàng",
                                cancelButtonText: "Đồng ý",
                                showCancelButton: true,
                                showCloseButton: true
                            }).then(function(result) {
                                if (result.isConfirmed) window.location.href = "/gio-hang"
                            });
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(data);
                        },
                    })
                }
            })
        });
    </script>
</body>

</html>
