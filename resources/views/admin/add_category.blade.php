<x-admin-layout>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <p class="text-alert" style="color:red;">{{ session('message') }}</p>

                        @if ($errors->any())
                            @foreach ($errors->all() as $err)
                                <p class="text-alert">{{ $err }}</p>
                            @endforeach
                        @endif
                        <form role="form" action="/save-category" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control" id="exampleInputPassword1"
                                    name="desc" placeholder="Mô tả danh mục "></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh
                                mục</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
</x-admin-layout>
