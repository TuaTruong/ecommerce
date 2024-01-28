<x-admin-layout>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin đăng nhập
            </div>
            <div class="table-responsive">
                <span class='text-alert'>{{session("message")}}</span>
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
                            <td>{{$user->name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
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
                <span class='text-alert'>{{session("message")}}</span>
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
                            <td>{{$shipping->name}}</td>
                            <td>{{$shipping->address}}</td>
                            <td>{{$shipping->phone}}</td>
                            <td>{{$shipping->email}}</td>
                            <td>{{$shipping->notes}}</td>
                            <td>
                                @if ($shipping->method==0)
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
            <div class="table-responsive">
                <span class='text-alert'>{{session("message")}}</span>
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_details as $ord)
                            <tr>
                                <td>{{$ord->product_name}}</td>
                                <td>{{$ord->product_quantity}}</td>
                                <td>{{$ord->product_price}}</td>
                                <td>{{$ord->product_price * $ord->product_quantity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
