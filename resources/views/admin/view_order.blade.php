<x-admin-layout>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin người mua
            </div>
            <div class="table-responsive">
                <span class='text-alert'>{{session("message")}}</span>
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Tên người mua</th>
                            <th>Địa chỉ</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$current_order->user->name}}</td>
                            <td>{{$current_order->user->phone}}</td>
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
                            <th>Tên người mua</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$current_order->shipping->name}}</td>
                            <td>{{$current_order->shipping->phone}}</td>
                            <td>{{$current_order->shipping->address}}</td>
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
                        <tr>
                            <td>{{$current_order->order_details->product_name}}</td>
                            <td>{{$current_order->order_details->product_quantity}}</td>
                            <td>{{$current_order->order_details->product_price}}</td>
                            <td>{{$current_order->total}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
