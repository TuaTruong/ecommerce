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
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Hình ảnh</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th>Hiển thị</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_product as $pro)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $pro->product_name }}</td>
                                <td>{{ $pro->product_price }}</td>
                                <td><img height="100" width="150" src="/upload/product/{{$pro->product_image}}" alt=""></td>
                                <td>{{ $pro->category->category_name }}</td>
                                <td>{{ $pro->brand->brand_name }}</td>
                                <td>
                                    @if ($pro->product_status)
                                        <a href="/toggle-product-status/{{ $pro->id }}"
                                            style="color: green">Hiện</a>
                                    @else
                                        <a href="/toggle-product-status/{{ $pro->id }}"
                                            style="color: red">Ẩn</a>
                                    @endif
                                </td>
                                <td>13.12.2023</td>
                                <td>
                                    <a href="/edit-product/{{ $pro->id }}" class="active"
                                        ui-toggle-class=""><i
                                            class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a href="/delete-product/{{ $pro->id }}" onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?')">
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
