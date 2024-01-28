<x-admin-layout>

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê đơn hàng
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
                            <th>Số thứ tự</th>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tình trạng đơn hàng</th>
                            <th style="width:40px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($orders as $key => $ord)
                            @php
                                $i++;
                            @endphp
                            <tr>
                                <td><i>{{ $i }}</i>
                                </td>
                                <td>{{ $ord->code }}</td>
                                <td>{{ $ord->created_at }}</td>
                                <td>
                                    @if ($ord->status == 1)
                                        Đơn hàng mới
                                    @else
                                        Đã xử lý
                                    @endif
                                </td>
                                <td>
                                    <a href="/view-order/{{ $ord->code }}" class="active" ui-toggle-class=""><i
                                            class="fa fa-eye text-success text-active"></i></a>
                                    <a href="/delete-order/{{ $ord->code }}"
                                        onclick="return confirm('Bạn có chắc là muốn xóa thương hiệu này không?')">
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
