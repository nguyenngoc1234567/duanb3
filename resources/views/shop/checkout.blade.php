@extends('shop.layout.master')
@section('main')
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i>
                            <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">


                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <div class="woocommerce-info">Phản hồi khách hàng ? <a class="showlogin" data-toggle="collapse"
                                    href="#login-form-wrap" aria-expanded="false" aria-controls="login-form-wrap">nhấn vào
                                    đây để đăng nhập</a>
                            </div>
                            <form class="checkout-form" method="POST" action="{{ route('order') }}">
                                @csrf
                                @if (isset(Auth()->guard('customers')->user()->name))
                                    <div id="customer_details" class="col-md-8">
                                        <div class="col-1">
                                            <div class="woocommerce-billing-fields">
                                                <h3>Nhập để thanh toán </h3>


                                                <p id="billing_first_name_field"
                                                    class="form-row form-row-first validate-required">
                                                    <label class="" for="billing_first_name">Họ và Tên <abbr
                                                            title="required" class="required">*</abbr>
                                                    </label>
                                                    <input value="{{ Auth()->guard('customers')->user()->name }}"
                                                        type="text" value="" placeholder=""
                                                        id="billing_first_name" name="billing_first_name"
                                                        class="input-text ">
                                                </p>


                                                <div class="clear"></div>



                                                <p id="billing_address_1_field"
                                                    class="form-row form-row-wide address-field validate-required">
                                                    <label class="" for="billing_address_1">Địa chỉ <abbr
                                                            title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text"
                                                        value="{{ Auth()->guard('customers')->user()->address }}"
                                                        placeholder="Địa chỉ" id="billing_address_1"
                                                        name="billing_address_1" class="input-text ">
                                                </p>



                                                <div class="clear"></div>

                                                <p id="billing_email_field"
                                                    class="form-row form-row-first validate-required validate-email">
                                                    <label class="" for="billing_email">Email<abbr title="required"
                                                            class="required">*</abbr>
                                                    </label>
                                                    <input type="text"
                                                        value="{{ Auth()->guard('customers')->user()->email }}"
                                                        placeholder="" id="billing_email" name="billing_email"
                                                        class="input-text ">
                                                </p>

                                                <p id="billing_phone_field"
                                                    class="form-row form-row-last validate-required validate-phone">
                                                    <label class="" for="billing_phone">Số điện thoại <abbr
                                                            title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text"
                                                        value="{{ Auth()->guard('customers')->user()->phone }}"placeholder=""
                                                        id="billing_phone" name="billing_phone" class="input-text ">
                                                </p>
                                                <div class="clear"></div>
                                            @else
                                                <h4>Vui lòng đăng nhập trước khi thanh toán nhé</h4>
                                                <a href="{{ route('login.index') }}" class="btn btn-danger">Đăng Nhập</a>
                                @endif


                            @php

                                $totalAll = 0;

                            @endphp


                        </div>
                    </div>
                    <div class="col-2">
                        <div class="woocommerce-shipping-fields">
                            <h3 id="ship-to-different-address">
                        </div>

                    </div>

                </div>
                <div class="col-md-4" id="order_review" style="position: relative;">
                    @if (session('cart'))
                        <table class="shop_table">

                            <thead>

                                <tr>
                                    <th class="product-name">Sản Phẩm</th>
                                    <th class="product-total">Tổng cộng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('cart') as $id => $details)
                                    @php
                                        $total = $details['price'] * $details['quantity'];
                                        $totalAll += $total;
                                    @endphp
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            <input type="hidden" value="{{ $id }}"
                                                name="product_id[]">{{ $details['nameVi'] ?? '' }} x <input type="hidden"
                                                value="{{ $id }}" name="quantity[]">
                                            {{ $details['quantity'] ?? '' }}
                                        </td>
                                        <td class="product-total">
                                            <input type="hidden" value="{{ $total }}"
                                                name="total[]">{{ number_format($total) }}
                                        </td>
                                    </tr>

                            </tbody>
                            <tfoot>

                            </tfoot>
                    @endforeach
                    @endif

                    </table>

                    <h4 style="color:red ">Tổng tiền:{{ number_format($totalAll) }}</h4 style="color: ">




                    <div id="payment">
                        <ul class="payment_methods methods">
                        </ul>

                        <div class="form-row place-order">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Đặt
                    hàng</button>
                </form>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>


@endsection
