<x-admin-layout>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh slider
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <p class="text-alert" style="color:red;">{{ session('message') }}</p>

                        @if ($errors->any())
                            @foreach ($errors->all() as $err)
                                <p class="text-alert">{{ $err }}</p>
                            @endforeach
                        @endif
                        <form role="form" action="/update-slide/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên slider</label>
                                <input type="text" name="name" class="form-control" value="{{$slide->name}}" id="exampleInputEmail1"
                                    placeholder="Tên slide">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả slider</label>
                                <textarea style="resize: none" rows="8" type="text" class="form-control" id="exampleInputPassword1"
                                    name="desc" placeholder="Mô tả danh mục">{{$slide->desc}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh slider</label>
                                <input type="file" name="image" class="form-control"
                                    id="exampleInputEmail1">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm slider</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
</x-admin-layout>
