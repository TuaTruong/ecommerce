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
                <span class='text-alert'>{{ session('message') }}</span>
                <table class="table table-striped b-t b-light" style="margin-bottom:10px">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số lượng sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th>Hiển thị</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_products as $pro)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox"
                                            name="post[]"><i></i></label>
                                </td>
                                <td>{{ $pro->name }}</td>
                                <td>{{ $pro->price }}</td>
                                <td>{{ $pro->qty }}</td>
                                <td>
                                    @isset($pro->image)
                                        <img height="100" width="150" src="/uploads/products/{{ $pro->image }}"
                                            alt="">
                                    @else
                                        Chưa có ảnh
                                    @endisset
                                </td>

                                <td>{{ $pro->category->name }}</td>
                                <td>{{ $pro->brand->name }}</td>
                                <td>
                                    @if ($pro->status)
                                        <a href="/toggle-product-status/{{ $pro->id }}"
                                            style="color: green">Hiện</a>
                                    @else
                                        <a href="/toggle-product-status/{{ $pro->id }}" style="color: red">Ẩn</a>
                                    @endif
                                </td>
                                <td>13.12.2023</td>
                                <td>
                                    <a href="/edit-product/{{ $pro->id }}" class="active" ui-toggle-class=""><i
                                            class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a href="/delete-product/{{ $pro->id }}"
                                        onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?')">
                                        <i class="fa fa-times text-danger text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$all_products->links()}}
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
