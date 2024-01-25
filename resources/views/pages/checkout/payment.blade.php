<x-layout>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active">Thanh toán giỏ hàng</li>
                </ol>
            </div>
            <!--/breadcrums-->

            <div class="review-payment">
                <h2>Xem lại đơn</h2>
                <div class="table-responsive cart_info">
                    @php
                    $content = Cart::content();
                    echo "
                    <pre>\n" . $content . "\n</pre>";
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
                                    <a href=""><img src="uploads/products/{{ $v_content->options->image }}" width="50"
                                            alt=""></a>
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
                                    <p class="cart_total_price">
                                        {{ number_format($v_content->qty * $v_content->price) }}
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

            <h4 style="margin-bottom: 50px">Chọn hình thức thanh toán</h4>
            <form action="/order-place" method="POST">
                @csrf
                <div class="payment-methods">
                    <span>
                        <label><input name="method" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
                    </span>
                    <span>
                        <label><input name="method" value="2" type="checkbox"> Nhận tiền mặt</label>
                    </span>
                    <span>
                        <label><input name="method" value="2" type="checkbox"> Thanh toán thẻ ghi nợ</label>
                    </span>
                    <input type="submit" value="Đặt hàng" class="btn btn-primary btn-sm" style="display: block">
                </div>
            </form>
        </div>
    </section>
    <!--/#cart_items-->
</x-layout>
