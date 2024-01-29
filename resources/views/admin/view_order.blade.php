<x-admin-layout>
    <div>
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thông tin đăng nhập
                </div>
                <div class="table-responsive">
                    <span class='text-alert'>{{ session('message') }}</span>
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br><br>
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thông tin vận chuyển
                </div>
                <div class="table-responsive">
                    <span class='text-alert'>{{ session('message') }}</span>
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th>Tên người nhận hàng</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Ghi chú</th>
                                <th>Hình thức thanh toán</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $shipping->name }}</td>
                                <td>{{ $shipping->address }}</td>
                                <td>{{ $shipping->phone }}</td>
                                <td>{{ $shipping->email }}</td>
                                <td>{{ $shipping->notes }}</td>
                                <td>
                                    @if ($shipping->method == 0)
                                        Thanh toán qua chuyển khoản
                                    @else
                                        Thanh toán tiền mặt
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br><br>
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Chi tiết đơn hàng
                </div>
            </div>
            <div class="table-responsive">
                <span class='text-alert'>{{ session('message') }}</span>
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Mã giảm giá</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($order_details as $ord)
                            @php
                                $total += $ord->product_price * $ord->product_quantity;
                            @endphp
                            <tr>
                                <td>{{ $ord->product_name }}</td>
                                <td>
                                    @if ($ord->product_coupon != 'no')
                                        {{ $ord->product_coupon }}
                                    @else
                                        Không có mã
                                    @endif
                                </td>
                                <td>{{ $ord->product_quantity }}</td>
                                <td>{{ number_format($ord->product_price, 0, ',', '.') }} VND</td>
                                <td>{{ number_format($ord->product_price * $ord->product_quantity, 0, ',', '.') }}
                                    VND
                                </td>
                            </tr>
                        @endforeach
                        @if ($coupon)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Giảm</td>
                                <td>
                                    @if ($coupon->condition == 1)
                                        {{ number_format($coupon->discount, 0, ',', '.') }} %
                                    @else
                                        {{ number_format($coupon->discount, 0, ',', '.') }} VND
                                    @endif
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Phí ship</td>
                            <td>
                                {{number_format($order_details[0]->feeship,0,",",".")}} VND
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>THANH TOÁN</td>
                            <td>
                                @if ($coupon)
                                    @php
                                        if ($coupon->condition == 1) {
                                            $total -= ($total * $coupon->discount) / 100;
                                        } else {
                                            $total -= $coupon->discount;
                                        }
                                    @endphp
                                @endif
                                {{ number_format($total+$order_details[0]->feeship, 0, ',', '.') }} VND
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a target="blank" href="/print-order/{{$order->code}}">In đơn hàng</a>
            </div>
        </div>
    </div>
</x-admin-layout>
