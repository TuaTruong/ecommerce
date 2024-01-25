<x-admin-layout>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    @php
                        $message = Session::get('message', null);
                        if ($message) {
                            echo "<span class='text-alert'>" . $message . '</span>';
                            Session::put('message', null);
                        }
                    @endphp
                    <div class="position-center">
                        <form role="form" action="/update-product/{{$edit_product->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" value="{{ $edit_product->product_name }}" name="product_name"
                                    class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" value="{{ $edit_product->product_price }}" name="product_price"
                                    class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" va name="product_image" class="form-control" id="exampleInputEmail1">
                                <img height="100" width="100" src="/upload/product/{{ $edit_product->product_image }}"
                                    alt="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control" id="exampleInputPassword1"
                                    name="product_desc" placeholder="Mô tả sản phẩm ">{{ $edit_product->product_desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control" id="exampleInputPassword1"
                                    name="product_content" placeholder="Nội dung sản phẩm ">{{ $edit_product->product_content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach ($cate_product as $cate)
                                        @if ($cate->id == $edit_product->category_id)
                                            <option selected value="{{ $cate->id }}">{{ $cate->category_name }}
                                            </option>
                                        @else
                                            <option value="{{ $cate->id }}">{{ $cate->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $brand)
                                        @if ($brand->id == $edit_product->brand_id)
                                            <option selected value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @else
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
</x-admin-layout>
