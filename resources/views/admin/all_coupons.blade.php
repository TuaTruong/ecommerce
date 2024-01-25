<x-admin-layout>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê mã giảm giá
            </div>

            <div class="table-responsive">
                @php
                    $message = Session::get('message', null);
                    if ($message) {
                        echo "<span class='text-alert'>" . $message . '</span>';
                        Session::put('message', null);
                    }
                @endphp
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên mã giảm giá</th>
                            <th>Mã giảm giá</th>
                            <th>Sỗ lượng mã giảm giá</th>
                            <th>Điều kiện giảm giá</th>
                            <th>Giảm</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_coupons as $coupon)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $coupon->name }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->quantity }}</td>
                                <td>
                                    @if ($coupon->condition)
                                        Giảm theo số tiền
                                    @else
                                        Giảm theo %
                                    @endif
                                </td>
                                <td>
                                    @if ($coupon->condition)
                                        Giảm {{$coupon->discount}} VNĐ
                                    @else
                                    Giảm {{$coupon->discount}} %
                                    @endif
                                </td>
                                <td>
                                    <a href="/delete-coupon/{{ $coupon->id }}" onclick="return confirm('Bạn có chắc là muốn xóa mã này không?')">
                                        <i class="fa fa-times text-danger text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</x-admin-layout>
