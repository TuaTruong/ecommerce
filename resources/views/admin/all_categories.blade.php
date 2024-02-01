<x-admin-layout>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê danh mục sản phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
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
                            <th>Tên danh mục</th>
                            <th>Hiển thị</th>
                            <th>Ngày thêm</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_categories as $cate_pro)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox"
                                            name="post[]"><i></i></label>
                                </td>
                                <td>{{ $cate_pro->name }}</td>
                                <td>
                                    @if ($cate_pro->status)
                                        <a href="/toggle-category-status/{{ $cate_pro->id }}"
                                            style="color: green">Hiện</a>
                                    @else
                                        <a href="/toggle-category-status/{{ $cate_pro->id }}" style="color: red">Ẩn</a>
                                    @endif
                                </td>
                                <td>13.12.2023</td>
                                <td>
                                    <a href="/edit-category/{{ $cate_pro->id }}" class="active" ui-toggle-class=""><i
                                            class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a href="/delete-category/{{ $cate_pro->id }}"
                                        onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')">
                                        <i class="fa fa-times text-danger text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="/import-csv" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" accept=".xlsx"><br>
                    <input type="submit" value="Import CSV" name="import_csv" class="btn btn-warning">
                </form>
                <form action="/export-csv" method="POST">
                    @csrf
                    <input type="submit" value="Export CSV" name="export_csv" class="btn btn-success">
                </form>

            </div>
        </div>
    </div>
</x-admin-layout>
