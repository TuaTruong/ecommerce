<!DOCTYPE html>

<head>
    <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ asset('backend/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('backend/css/style-responsive.css') }}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('backend/css/font.css') }}" type="text/css" />
    <link href="{{ asset('backend/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/morris.css') }}" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="{{ asset('backend/css/monthly.css') }}">
    <!-- //calendar -->
    <!-- //font-awesome icons -->


    <script src="{{ asset('backend/js/raphael-min.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/jquery2.0.3.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('backend/js/morris.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
</head>

<body style="height: 100vh">
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="index.html" class="logo">
                    ADMIN
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ asset('backend/images/2.png') }}">

                            <span class="username">{{ auth()->user()->name }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="/logout"><i class="fa fa-key"></i> Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="/dashboard">
                                <i class="fa fa-dashboard"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        @hasrole("admin")
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span>User</span>
                                </a>
                                <ul class="sub">
                                    <li><a href="/all-users">Quản lý User</a></li>
                                </ul>
                            </li>
                        @endhasrole
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Slider</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/all-slides">Quản lý Slider</a></li>
                                <li><a href="/add-slide">Thêm Slider</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Vận chuyển</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/delivery">Quản lý vận chuyển</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Mã giảm giá</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/all-coupons">Quản lý mã giảm giá</a></li>
                                <li><a href="/add-coupon">Thêm mã giảm giá</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Đơn hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/manage-order">Quản lý đơn hàng</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Danh mục sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/add-category">Thêm danh mục sản phẩm</a></li>
                                <li><a href="/all-category">Liệt kê danh mục sản phẩm</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Thương hiệu sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/add-brand">Thêm thương hiệu sản phẩm</a></li>
                                <li><a href="/all-brand">Liệt kê thương hiệu sản phẩm</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/all-product">Quản lý sản phẩm</a></li>
                                <li><a href="/add-product">Thêm sản phẩm</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                {{ $slot }}
            </section>
            <!-- footer -->
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a>
                    </p>
                </div>
            </div>
            <!-- / footer -->
        </section>
        <!--main content end-->
    </section>
    <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.scrollTo.js') }}"></script>
    <!-- morris JavaScript -->
    {{-- <script>
        ClassicEditor
            .create(document.querySelector('#exampleInputPassword1'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#exampleInputPassword2'))
            .catch(error => {
                console.error(error);
            });
    </script> --}}
    <script>
        $(document).ready(function() {


            //BOX BUTTON SHOW AND CLOSE
            jQuery('.small-graph-box').hover(function() {
                jQuery(this).find('.box-button').fadeIn('fast');
            }, function() {
                jQuery(this).find('.box-button').fadeOut('fast');
            });
            jQuery('.small-graph-box .box-close').click(function() {
                jQuery(this).closest('.small-graph-box').fadeOut(200);
                return false;
            });

            //CHARTS
            function gd(year, day, month) {
                return new Date(year, month - 1, day).getTime();
            }

            graphArea2 = Morris.Area({
                element: 'hero-area',
                padding: 10,
                behaveLikeLine: true,
                gridEnabled: false,
                gridLineColor: '#dddddd',
                axes: true,
                resize: true,
                smooth: true,
                pointSize: 0,
                lineWidth: 0,
                fillOpacity: 0.85,
                data: [{
                        period: '2015 Q1',
                        iphone: 2668,
                        ipad: null,
                        itouch: 2649
                    },
                    {
                        period: '2015 Q2',
                        iphone: 15780,
                        ipad: 13799,
                        itouch: 12051
                    },
                    {
                        period: '2015 Q3',
                        iphone: 12920,
                        ipad: 10975,
                        itouch: 9910
                    },
                    {
                        period: '2015 Q4',
                        iphone: 8770,
                        ipad: 6600,
                        itouch: 6695
                    },
                    {
                        period: '2016 Q1',
                        iphone: 10820,
                        ipad: 10924,
                        itouch: 12300
                    },
                    {
                        period: '2016 Q2',
                        iphone: 9680,
                        ipad: 9010,
                        itouch: 7891
                    },
                    {
                        period: '2016 Q3',
                        iphone: 4830,
                        ipad: 3805,
                        itouch: 1598
                    },
                    {
                        period: '2016 Q4',
                        iphone: 15083,
                        ipad: 8977,
                        itouch: 5185
                    },
                    {
                        period: '2017 Q1',
                        iphone: 10697,
                        ipad: 4470,
                        itouch: 2038
                    },

                ],
                lineColors: ['#eb6f6f', '#926383', '#eb6f6f'],
                xkey: 'period',
                redraw: true,
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });


        });
    </script>
    <!-- calendar -->
    <script type="text/javascript" src="{{ asset('backend/js/monthly.js') }}"></script>
    <script type="text/javascript">
        $(window).load(function() {

            $('#mycalendar').monthly({
                mode: 'event',

            });

            $('#mycalendar2').monthly({
                mode: 'picker',
                target: '#mytarget',
                setWidth: '250px',
                startHidden: true,
                showTrigger: '#mytarget',
                stylePast: true,
                disablePast: true
            });

            switch (window.location.protocol) {
                case 'http:':
                case 'https:':
                    // running on a server, should be good.
                    break;
                case 'file:':
                    alert('Just a heads-up, events will not work when run locally.');
            }

        });
    </script>
    <script>
        $(document).ready(function() {
            $(".update_qty_order").click(function() {
                let order_product_id = $(this).data('product_id');
                let order_qty = $(".order_qty_" + order_product_id).val()
                let order_code = $(".order_code").val()
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "/update-order-quantity",
                    method: "POST",
                    data: {
                        order_product_id: order_product_id,
                        order_qty: order_qty,
                        order_code: order_code,
                        _token: _token
                    },
                    success: function(data) {
                        alert("Cập nhật số lượng thành công");
                    },
                    error: function(data, textStatus, errorThrown) {

                        console.log(data)
                    },
                })

            })
            $(".order_status").on("change", function() {
                let order_status = $(this).val();
                let order_id = $(this).children(":selected").attr("id");
                let _token = $('input[name="_token"]').val();

                let quantity = [];
                $("input[name='product_quantity']").each(function() {
                    quantity.push($(this).val());
                })
                let order_product_id = [];
                $("input[name='order_product_id']").each(function() {
                    order_product_id.push($(this).val());
                })

                let errCount = 0;
                for (let i = 0; i < order_product_id.length; i++) {
                    let order_qty = $('.order_qty_' + order_product_id[i]).val()
                    let order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val()

                    if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                        $(".color_qty_" + order_product_id[i]).css("background", "#000");
                        errCount++;
                    }
                }
                if (errCount > 0) {
                    alert("Số lượng bán trong kho không đủ");
                } else {
                    $.ajax({
                        url: "/update-order-status",
                        method: "POST",
                        data: {
                            order_status: order_status,
                            order_id: order_id,
                            quantity: quantity,
                            order_product_id: order_product_id,
                            _token: _token
                        },
                        success: function(data) {
                            alert("Thay đổi tình trạng đơn hàng thành công");
                            location.reload()
                        },
                        error: function(data, textStatus, errorThrown) {

                            console.log(data)
                        },
                    })
                }
            })


            $(document).on("blur", ".fee_edit", function() {
                let id = $(this).data("feeship_id");
                let fee_value = $(this).text();
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "/update-delivery",
                    method: "POST",
                    data: {
                        id: id,
                        fee: fee_value,
                        _token: _token
                    },
                    success: function(data) {
                        fetch_delivery();
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(data);

                    },
                })
            })

            function fetch_delivery() {
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "/select-feeship",
                    method: "POST",
                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        $("#load_fee").html(data)
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(data);

                    },
                })
            }

            fetch_delivery();

            $(".add_delivery").click(function() {
                let city = $(".city").val()
                let province = $(".province").val()
                let ward = $(".ward").val()
                let fee_ship = $(".fee_ship").val()
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "/add-delivery",
                    method: "POST",
                    data: {
                        matp: city,
                        maqh: province,
                        xaid: ward,
                        feeship: fee_ship,
                        _token: _token
                    },
                    success: function(data) {
                        fetch_delivery();
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(data);

                    },
                })
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
        })
    </script>
    <!-- //calendar -->
</body>

</html>
