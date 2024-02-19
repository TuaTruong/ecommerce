<x-admin-layout>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê Banner
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
                            <th>Tên slide</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Tình trạng</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slides as $slide)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $slide->name }}</td>
                                <td><img height="100" width="150" src="/uploads/sliders/{{ $slide->image }}"
                                    alt=""></td>
                                <td>{{ $slide->desc }}</td>
                                <td>
                                    @if ($slide->status)
                                        <a href="/toggle-slide-status/{{ $slide->id }}"
                                            style="color: green">Hiện</a>
                                    @else
                                        <a href="/toggle-slide-status/{{ $slide->id }}"
                                            style="color: red">Ẩn</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="/edit-slide/{{ $slide->id }}" class="active"
                                        ui-toggle-class=""><i
                                            class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a href="/delete-category/{{ $slide->id }}" onclick="return confirm('Bạn có chắc là muốn xóa slide này không?')">
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
