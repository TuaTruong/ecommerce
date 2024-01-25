<x-admin-layout>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Liệt kê danh mục sản phẩm
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
                        <form role="form" action="/update-category-product/{{$edit_category_product->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" value="{{$edit_category_product->category_name}}" name="category_product_name" class="form-control"
                                    id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control" id="exampleInputPassword1"
                                    name="category_product_desc" placeholder="Mô tả danh mục">{{$edit_category_product->category_desc}}</textarea>
                            </div>
                            <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-admin-layout>
