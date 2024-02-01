<x-layout>
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">{{$title ?? "Sản phẩm mới nhất"}}</h2>
        @foreach ($all_product as $product)
        <a href="/chi-tiet-san-pham/{{$product->id}}">
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <form>
                                @csrf
                                {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                                <input type="hidden" value="{{ $product->id }}" class="cart_product_id_{{$product->id}}">
                                <input type="hidden" value="{{ $product->name }}" class="cart_product_name_{{$product->id}}">
                                <input type="hidden" value="{{ $product->image }}" class="cart_product_image_{{$product->id}}">
                                <input type="hidden" value="{{ $product->price }}" class="cart_product_price_{{$product->id}}">
                                <input class="product_storage_qty_{{$product->id}}" type="hidden" value="{{ $product->qty }}" />

                                <input type="hidden" class="cart_product_qty_{{$product->id}}" value="1">
                                <a href="/chi-tiet-san-pham/{{ $product->id }}">
                                    <img src="{{ asset('/uploads/products/' . $product->image) }}" alt="" />
                                    <h2>{{ number_format($product->price) }} VND</h2>
                                    <p>{{ $product->name }}</p>
                                </a>
                                <button type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id_pro="{{$product->id}}">Thêm vào
                                    giỏ hàng</button>
                            </form>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào yêu thích</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào so sánh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div><!--features_items-->
    {{$all_product->links()}}
</x-layout>
