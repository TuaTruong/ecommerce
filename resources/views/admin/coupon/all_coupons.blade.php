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
                            <th>Điều kiện giảm giá</th>
                            <th>Giảm</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_coupons as $coupon)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox"
                                            name="post[]"><i></i></label>
                                </td>
                                <td>{{ $coupon->name }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>
                                    @if ($coupon->condition)
                                        Giảm theo %
                                    @else
                                        Giảm theo số tiền
                                    @endif
                                </td>
                                <td>
                                    @if ($coupon->condition)
                                        Giảm {{ $coupon->discount }} %
                                    @else
                                        Giảm {{ number_format($coupon->discount,0,",",".") }} VNĐ
                                    @endif
                                </td>
                                <td>
                                    <a href="/delete-coupon/{{ $coupon->id }}"
                                        onclick="return confirm('Bạn có chắc là muốn xóa mã này không?')">
                                        <i class="fa fa-times text-danger text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
