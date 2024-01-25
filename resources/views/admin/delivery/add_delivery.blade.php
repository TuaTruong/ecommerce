<x-admin-layout>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm vận chuyển
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
                                <label for="exampleInputPassword1">Chọn tỉnh thành phố</label>
                                <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                    <option value="">---Chọn tỉnh thành phố---</option>
                                    @foreach ($cities as $key => $val)
                                        <option value="{{ $val->matp }}">{{ $val->name_city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn quận huyện</label>
                                <select name="province" id="province"
                                    class="form-control input-sm m-bot15 province choose">
                                    <option value="">---Chọn quận huyện---</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn xã phường</label>
                                <select name="ward" id="ward" class="form-control input-sm m-bot15 ward">
                                    <option value="">---Chọn xã phường---</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" name="fee_ship" class="form-control fee_ship "
                                    id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <button type="button" name="add_delivery" class="btn btn-info add_delivery">Thêm phí vận
                                chuyển</button>
                        </form>
                    </div>
                    <br>
                    <div id="load_fee">

                    </div>
                </div>
            </section>
        </div>
</x-admin-layout>
