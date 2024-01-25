<x-admin-layout>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="/save-brand" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên thương hiệu">
                                @error('name')
                                    <p class="fs-sm text-alert" style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control" id="exampleInputPassword1"
                                    name="desc" placeholder="Mô tả thương hiệu "></textarea>
                                @error('desc')
                                    <p class="fs-sm text-alert" style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="status" class="form-control input-sm m-bot15">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương
                                hiệu</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
</x-admin-layout>
