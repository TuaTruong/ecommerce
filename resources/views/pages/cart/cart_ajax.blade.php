<x-layout>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Trang chủ</a></li>
                    <li class="active">Giỏ hàng của bạn</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <form action="/update-cart" method="POST">
                    @csrf
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Hình ảnh</td>
                                <td class="description">Tên sản phẩm</td>
                                <td class="description">Tồn kho</td>
                                <td class="price">Giá sản phẩm</td>
                                <td class="quantity">Số lượng</td>
                                <td class="total">Thành tiền</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <p class="text-alert" style="color: red">{!! session('message') !!}</p>
                            @php
                                // print_r(session('cart'));
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
                                            <a href=""><img src="uploads/products/{{ $cart['image'] }}"
                                                    width="50" alt="{{ $cart['name'] }}"></a>
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href=""></a></h4>
                                            <p>{{ $cart['name'] }}</p>
                                        </td>
                                        <td class="cart_price">
                                            <p>{{ number_format($cart['storage_qty'], 0, ',', '.') }}</p>
                                        </td>

                                        <td class="cart_price">
                                            <p>{{ number_format($cart['price'], 0, ',', '.') }} VND</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <input class="cart_quantity_input" type="text"
                                                    name="cart_qty[{{ $cart['session_id'] }}]"
                                                    value="{{ $cart['qty'] }}" autocomplete="off" min="1"
                                                    size="2">
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
                                        <a class="btn btn-default check_out" href="/delete-all-cart-product">Xóa toàn bộ
                                            sản
                                            phẩm trong giỏ hàng</a>
                                    </td>
                                    <td>
                                        <li>Tổng <span>{{ number_format($total, 0, ',', '.') }} VND</span></li>
                                        @if (session('coupon'))
                                            <li>
                                                @if (session('coupon'))
                                                    @if (session('coupon')[0]['condition'])
                                                        @php
                                                            $total_coupon = $total - ($total * session('coupon')[0]['discount']) / 100;
                                                        @endphp
                                                        Mã giảm: {{ session('coupon')[0]['discount'] }} %
                                                    @else
                                                        @php
                                                            $total_coupon = $total - session('coupon')[0]['discount'];
                                                        @endphp
                                                        Mã giảm:
                                                        {{ number_format(session('coupon')[0]['discount'], 0, ',', '.') }}
                                                        VND
                                                    @endif
                                                @endif
                                            </li>
                                            <li>Thành tiền <span>{{ number_format($total_coupon, 0, ',', '.') }}
                                                    VND</span></li>
                                        @else
                                            <li>Thành tiền <span>{{ number_format($total, 0, ',', '.') }} VND</span>
                                            </li>
                                        @endif
                                    </td>
                                    <td>
                                        @auth
                                            <a class="btn btn-default check_out" href="/checkout">Thanh toán</a>
                                        @else
                                            <a class="btn btn-default check_out" href="/login-checkout">Đăng nhập để thanh
                                                toán</a>
                                        @endauth
                                    </td>
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
                                <input type="submit" class="btn btn-default check_coupon" value="Tính mã giảm giá">
                                @if (session('coupon'))
                                    <a href="/unset-coupon" class="btn btn-default check_coupon">Xoá mã khuyến mãi</a>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endif
            </div>
        </div>
    </section> <!--/#cart_items-->
</x-layout>
