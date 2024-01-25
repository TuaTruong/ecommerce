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
                        <form role="form" action="/update-product/{{ $edit_product->id }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" value="{{ $edit_product->name }}" name="name"
                                    class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                                @error('name')
                                    <p class="text-alert">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" value="{{ $edit_product->price }}" name="price"
                                    class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                                @error('price')
                                    <p class="text-alert">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                                <img height="100" width="100" src="/uploads/products/{{ $edit_product->image }}"
                                    alt="">
                                @error('image')
                                    <p class="text-alert">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control" id="exampleInputPassword1"
                                    name="desc" placeholder="Mô tả sản phẩm ">{{ $edit_product->desc }}</textarea>
                                @error('desc')
                                    <p class="text-alert">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control" id="exampleInputPassword1"
                                    name="content" placeholder="Nội dung sản phẩm ">{{ $edit_product->content }}</textarea>
                                @error('content')
                                    <p class="text-alert">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="category_id" class="form-control input-sm m-bot15">
                                    @foreach ($all_categories as $cate)
                                        @if ($cate->id == $edit_product->category_id)
                                            <option selected value="{{ $cate->id }}">{{ $cate->name }}
                                            </option>
                                        @else
                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-alert">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                <select name="brand_id" class="form-control input-sm m-bot15">
                                    @foreach ($all_brands as $brand)
                                        @if ($brand->id == $edit_product->brand_id)
                                            <option selected value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @else
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <p class="text-alert">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
</x-admin-layout>
