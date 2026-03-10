@extends('layout/home')
@section('body')
<!-- inner page section -->
<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <h3>Product Grid</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end inner page section -->
<!-- product section -->
<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <!-- Thêm sản phẩm vào giỏ -->
                            <a href="{{ route('cart.add', $product->id) }}" class="option1">
                                Add To Cart
                            </a>
                            <!-- Xem chi tiết sản phẩm -->
                            <a href="{{ route('single_product', $product->id) }}" class="option2">
                                Buy Now
                            </a>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}">
                    </div>
                    <div class="detail-box">
                        <h5>{{ $product->name }}</h5>
                        <h6>{{ number_format($product->price, 0, ',', '.') }}đ</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- end product section -->
@endsection