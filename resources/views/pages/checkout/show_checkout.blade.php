<x-layout>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active">Thanh toán giỏ hàng</li>
                </ol>
            </div><!--/breadcrums-->
            <p>{{session("fee")}}
            </p>
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Điền thông tin gửi hàng</p>
                            <div class="form-one">
                                <form method="POST">
                                    @csrf
                                    @isset($shipping)
                                        <input type="text" placeholder="Email" name="email" class="shipping_email"
                                        value="{{$shipping->email}}">
                                        <input type="text" placeholder="Họ và tên" name="name" class="shipping_name" value="{{$shipping->name}}">
                                        <input type="text" placeholder="Địa chỉ" name="address" class="shipping_address" value="{{$shipping->address}}">
                                        <input type="text" placeholder="Phone" name="phone" class="shipping_phone" value="{{$shipping->phone}}">
                                        <textarea name="note" placeholder="Ghi chú đơn hàng của bạn" rows="10" class="shipping_notes"></textarea>
                                    @else
                                        <input type="text" placeholder="Email" name="email" class="shipping_email"
                                        value="">
                                        <input type="text" placeholder="Họ và tên" name="name" class="shipping_name" value="">
                                        <input type="text" placeholder="Địa chỉ" name="address" class="shipping_address" value="">
                                        <input type="text" placeholder="Phone" name="phone" class="shipping_phone" value="">
                                        <textarea name="note" placeholder="Ghi chú đơn hàng của bạn" rows="10" class="shipping_notes"></textarea>
                                    @endisset
                                    @if (session('fee'))
                                        <input type="hidden" name="shipping_fee" class="shipping_fee"
                                            value="{{ session('fee') }}">
                                    @else
                                        <input type="hidden" name="shipping_fee" class="shipping_fee" value="40000">
                                    @endif

                                    @if (session('coupon'))
                                        <input type="hidden" name="order_coupon" class="order_coupon"
                                            value="{{ session('coupon')[0]['code'] }}">
                                    @else
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                                    @endif

                                    <div class="">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                            <select name="payment_select" id=""
                                                class="form-control input-sm m-bot1 payment_select">
                                                <option value="0">Qua chuyển khoản</option>
                                                <option value="1">Tiền mặt</option>
                                            </select>
                                        </div>
                                    </div>


                                </form>
                                <form role="form" action="/save-category" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn tỉnh thành phố</label>
                                        <select name="city" id="city"
                                            class="form-control input-sm m-bot15 choose city">
                                            <option value="">---Chọn tỉnh thành phố---</option>
                                            @foreach ($cities as $key => $val)
                                                <option value="{{ $val->matp }}">{{ $val->name_city }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn quận huyện</label>
                                        <select name="province" id="province"
                                            class="form-control input-sm m-bot15 province choose">
                                            <option value="">---Chọn quận huyện---</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn xã phường</label>
                                        <select name="ward" id="ward"
                                            class="form-control input-sm m-bot15 ward">
                                            <option value="">---Chọn xã phường---</option>

                                        </select>
                                    </div>

                                    <input type="button" value="Tính phí vận chuyển" name="calculate_order "
                                        class="btn btn-primary btn-sm calculate_delivery check_out"
                                        style="margin-left:0px">
                                    <input type="button" value="Xác nhận đơn hàng" name="send_order"
                                        class="btn btn-primary btn-sm send_order check_out" style="margin-left:0px">
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 clearfix">
                        <div class="table-responsive cart_info">
                            <form action="/update-cart" method="POST">
                                @csrf
                                <table class="table table-condensed">
                                    <thead>
                                        <tr class="cart_menu">
                                            <td class="image">Hình ảnh</td>
                                            <td class="description">Tên sản phẩm</td>
                                            <td class="price">Giá sản phẩm</td>
                                            <td class="quantity">Số lượng</td>
                                            <td class="total">Thành tiền</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <p class="text-alert" style="color: red">{{ session('message') }}</p>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @if (session('cart'))
                                            @foreach (session('cart') as $cart)
                                                @php
                                                    $subtotal = $cart['qty'] * $cart['price'];
                                                    $total += $subtotal;
                                                @endphp
                                                <tr>
                                                    <td class="cart_product">
                                                        <a href=""><img
                                                                src="uploads/products/{{ $cart['image'] }}"
                                                                width="50" alt="{{ $cart['name'] }}"></a>
                                                    </td>
                                                    <td class="cart_description">
                                                        <h4><a href=""></a></h4>
                                                        <p>{{ $cart['name'] }}</p>
                                                    </td>
                                                    <td class="cart_price">
                                                        <p>{{ number_format($cart['price'], 0, ',', '.') }} VND</p>
                                                    </td>
                                                    <td class="cart_quantity">
                                                        <div class="cart_quantity_button">
                                                            <input class="cart_quantity_input" type="text"
                                                                name="cart_qty[{{ $cart['session_id'] }}]"
                                                                value="{{ $cart['qty'] }}" autocomplete="off"
                                                                min="1" size="2">
                                                            <input type="hidden" value="" name="rowId_Cart"
                                                                class="form-controll">

                                                        </div>
                                                    </td>
                                                    <td class="cart_total">
                                                        <p class="cart_total_price">
                                                            {{ number_format($subtotal, 0, ',', '.') }} VND</p>
                                                    </td>
                                                    <td class="cart_delete">
                                                        <a class="cart_quantity_delete"
                                                            href="/delete-cart-product/{{ $cart['session_id'] }}"><i
                                                                class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <input type="submit" value="Cập nhật giỏ hàng" name="update_qty"
                                                        class="check_out btn btn-default btn-sm">
                                                </td>
                                                <td>
                                                    <a class="btn btn-default check_out"
                                                        href="/delete-all-cart-product">Xóa toàn bộ
                                                        sản
                                                        phẩm trong giỏ hàng</a>
                                                </td>
                                                <td>
                                                    <li>Tổng <span>{{ number_format($total, 0, ',', '.') }} VND</span>
                                                    </li>
                                                    @if (session('coupon'))
                                                        <li>
                                                            @if (session('coupon'))
                                                                @if (session('coupon')[0]['condition'])
                                                                    @php
                                                                        $total = $total - ($total * session('coupon')[0]['discount']) / 100;
                                                                    @endphp
                                                                    Mã giảm: {{ session('coupon')[0]['discount'] }} %
                                                                @else
                                                                    @php
                                                                        $total = $total - session('coupon')[0]['discount'];
                                                                    @endphp
                                                                    Mã giảm:
                                                                    {{ number_format(session('coupon')[0]['discount'], 0, ',', '.') }}
                                                                    VND
                                                                @endif
                                                            @endif
                                                        </li>
                                                    @endif

                                                    @php
                                                        if (session('fee')) {
                                                            $feeship = session('fee');
                                                        }else {
                                                            $feeship = 0;
                                                        }
                                                    @endphp

                                                    <li class="feeship_container">
                                                        @if (session('fee'))
                                                            <a class="feeship_delete" href="/delete-fee">
                                                                <i class="fa fa-times"></i>
                                                            </a>

                                                            Phí vận chuyển:
                                                            <span>
                                                                {{ number_format(session('fee'), 0, ',', '.') }} VND
                                                            </span>
                                                        @else
                                                            Phí vận chuyển:
                                                            <span></span>
                                                        @endif
                                                    </li>

                                                    @php
                                                        $total += $feeship;
                                                    @endphp
                                                    <li>Thành tiền <span>{{ number_format($total, 0, ',', '.') }}
                                                            VND</span></li>
                                                </td>
                                                {{-- <td>
                                                    @auth
                                                        <a class="btn btn-default check_out" href="/checkout">Thanh
                                                            toán</a>
                                                    @else
                                                        <a class="btn btn-default check_out" href="/login-checkout">Đăng
                                                            nhập để thanh
                                                            toán</a>
                                                    @endauth
                                                </td> --}}
                                            </tr>
                                        @else
                                            <tr class="d-flex">
                                                <td colspan="5">Làm ơn thêm sản phẩm vào giỏ hàng</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </form>
                            @if (session('cart'))
                                <tr>
                                    <td colspan="5">
                                        <form action="/check-coupon" method="POST">
                                            @csrf
                                            <input type="text" class="form-control" name="code"
                                                placeholder="Nhập mã giảm giá">
                                            <br>
                                            <input type="submit" class="btn btn-default check_coupon"
                                                value="Tính mã giảm giá">
                                            @if (session('coupon'))
                                                <a href="/unset-coupon" class="btn btn-default check_coupon">Xoá mã
                                                    khuyến mãi</a>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endif

                        </div>

                        {{-- <input type="button" value="Xác nhận đơn hàng" name="send_order" class="send_order"
                        class="btn btn-primary btn-sm"> --}}
                    </div>
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->
</x-layout>
