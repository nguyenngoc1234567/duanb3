@extends('shop.layout.master')
@section('main')
<div class="zigzag-bottom"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="latest-product">
                <h2 class="section-title"> Sản phẩm </h2>


                <div class="product-carousel">
                    @foreach ($products as $product )
                    <div class="single-product">
                        <div class="product-f-image">
                            <img src="{{ asset('public/assets/product/'. $product->image) }}" alt="">
                            <div class="product-hover">
                                <a href="{{route('shop.store',$product->id)}}" id="{{ $product->id }}"class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng </a>
                                <a href="{{ route('shop.showProduct' , $product->id) }}" class="view-details-link"><i class="fa fa-link"></i>Xem chi tiết </a>
                            </div>
                        </div>


                        <h2><a href="single-product.html">{{$product->name}}</a></h2>

                        <div class="product-carousel-price">
                            <ins>{{number_format($product->price)}} vnd</ins>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
