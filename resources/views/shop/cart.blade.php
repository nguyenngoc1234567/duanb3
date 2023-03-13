@extends('shop.layout.master')
@section('main')
<div class="offset-12">
    <div class="product-content-right">
        <div class="woocommerce">
            <form method="post" action="#">
                <table cellspacing="0" class="shop_table cart">
                    <thead>
                        <tr>
                            <th class="product-remove">Tùy chọn</th>
                            <th class="product-thumbnail">Ảnh</th>
                            <th class="product-name">Sản phẩm</th>
                            <th class="product-price">Giá</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="product-subtotal">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total = 0;
                        $totalAll = 0;
                    @endphp
                     @if (session('cart'))
                     @foreach (session('cart') as $id => $details)
                     @php
                         $total = $details['price'] * $details['quantity'];
                         $totalAll += $total;
                     @endphp
                        <tr class="cart_item">
                            <td class="product-remove">
                                <a title="Remove this item" class="remove" href="{{ route('remove.from.cart', $id) }}">×</a>
                            </td>

                            <td class="product-thumbnail">
                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up"
                                        class="shop_thumbnail"
                                        src="{{ asset('public/assets/product/'.$details['image']) }}"></a>
                            </td>

                            <td class="product-name">
                                <a href="single-product.html">{{ $details['nameVi'] ?? '' }}</a>
                            </td>

                            <td class="product-price">
                                <span class="amount">{{ number_format($details['price']) }}</span>
                            </td>

                            <td class="product-quantity">
                                <div class="quantity buttons_added">

                                    <input type="number" size="4" class="input-text qty text" title="Qty"
                                        value="{{ $details['quantity'] }}" min="0" step="1">
                                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                                </div>
                            </td>

                            <td class="product-subtotal">
                                <span class="amount">{{ number_format($total) }}</span>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>
                               <h4>Giỏ hàng đang rỗng?</h4>
                               <button> <h4><a href="{{route('shop.index')}}">Tiếp tục đi mua sắm nào </a></h4></button>

                            </td>
                        </tr>
                        @endif
                        <tr>
                            <td class="actions" colspan="6">

                                    <a href="{{ route('checkOuts') }}" class="btn btn-danger pull-right">Thanh toán</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <div class="cart-collaterals">
                <div class="cart_totals ">
                    <h2>Tổng thanh toán </h2>

                    <table cellspacing="0">
                        <tbody>
                            <tr class="cart-subtotal">
                                <th>Tổng thu</th>
                                <td><span class="amount"> {{ number_format($totalAll) }}</span></td>
                            </tr>
                            <tr class="shipping">
                                <th>Phí ship </th>
                                <td>25,000</td>
                            </tr>
                            <tr class="order-total">
                                <th>Tổng đơn hàng </th>
                                <td><strong><span class="amount">{{ number_format($totalAll + 25000)  }}</span></strong> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


