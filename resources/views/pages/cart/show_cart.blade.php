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
                @php
                    $content = Cart::content();
                    echo "<pre>\n" . $content . "\n</pre>";
                @endphp
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Sản phẩm</td>
                            <td class="description"></td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($content as $v_content)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="uploads/products/{{ $v_content->options->image }}"
                                            width="50" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $v_content->name }}</a></h4>
                                    <p>Web ID: 1089772</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($v_content->price) }} VND</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <form action="/update-cart-quantity" method="POST">
                                            @csrf
                                            <input class="cart_quantity_input" type="text" name="cart_quantity"
                                                value="{{ $v_content->qty }}" autocomplete="off" size="2">
                                            <input type="hidden" value="{{ $v_content->rowId }}" name="rowId_Cart"
                                                class="form-controll">
                                            <input type="submit" value="Cập nhật" name="update_qty"
                                                class="btn btn-default btn-sm">
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ number_format($v_content->qty * $v_content->price) }}
                                        VND</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="/delete-to-cart/{{ $v_content->rowId }}"><i
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Tổng <span>{{ Cart::priceTotal(0) }} VND</span></li>
                            <li>Thuế <span>{{ Cart::tax(0) }} VND</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            <li>Thành tiền <span>{{ Cart::total(0) }} VND</span></li>
                        </ul>

                        @auth
                            <a class="btn btn-default check_out" href="/checkout">Thanh toán</a>
                        @else
                            <a class="btn btn-default check_out" href="/login-checkout">Thanh toán</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
</x-layout>
