<x-admin-layout>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm mã giảm giá
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <p class="text-alert" style="color:red;">{{ session('message') }}</p>

                        @if ($errors->any())
                            @foreach ($errors->all() as $err)
                                <p class="text-alert">{{ $err }}</p>
                            @endforeach
                        @endif
                        <form role="form" action="/save-coupon" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mã giảm giá</label>
                                <input type="text" name="code" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số lượng mã giảm giá</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control"
                                    name="quantity"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tính năng mã</label>
                                <select name="condition" class="form-control input-sm m-bot15">
                                    <option value="0">Giảm theo tiền</option>
                                    <option value="1">Giảm theo phần trăm</option>
                                </select>
                            </div>
                            <div class="form-group">Nhập số % hoặc tiền giảm</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control" 
                                    name="discount" placeholder="Mô tả danh mục "></textarea>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm mã</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
</x-admin-layout>
