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

                            <form id="login-form-wrap" class="login collapse" method="post">


                                <p>If you have shopped with us before, please enter your details in the boxes below. If you
                                    are a new customer please proceed to the Billing &amp; Shipping section.</p>

                                <p class="form-row form-row-first">
                                    <label for="username">Username or email <span class="required">*</span>
                                    </label>
                                    <input type="text" id="username" name="username" class="input-text">
                                </p>
                                <p class="form-row form-row-last">
                                    <label for="password">Password <span class="required">*</span>
                                    </label>
                                    <input type="password" id="password" name="password" class="input-text">
                                </p>
                                <div class="clear"></div>


                                <p class="form-row">
                                    <input type="submit" value="Login" name="login" class="button">
                                    <label class="inline" for="rememberme"><input type="checkbox" value="forever"
                                            id="rememberme" name="rememberme"> Remember me </label>
                                </p>
                                <p class="lost_password">
                                    <a href="#">Lost your password?</a>
                                </p>

                                <div class="clear"></div>
                            </form>



                            <form id="coupon-collapse-wrap" method="post" class="checkout_coupon collapse">

                                <p class="form-row form-row-first">
                                    <input type="text" value="" id="coupon_code" placeholder="Coupon code"
                                        class="input-text" name="coupon_code">
                                </p>

                                <p class="form-row form-row-last">
                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                </p>

                                <div class="clear"></div>
                            </form>

                            <form enctype="multipart/form-data" action="#" class="checkout" method="post"
                                name="checkout">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Nhập để thanh toán </h3>
                                            <p id="billing_country_field"
                                                class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                <label class="" for="billing_country">Quốc gia <abbr title="required"
                                                        class="required">*</abbr>
                                                </label>
                                                <select class="country_to_state country_select" id="billing_country"
                                                    name="billing_country">
                                                    <option value="">Việt nam</option>

                                                </select>
                                            </p>

                                            <p id="billing_first_name_field"
                                                class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Họ <abbr
                                                        title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder=""
                                                    id="billing_first_name" name="billing_first_name"
                                                    class="input-text ">
                                            </p>

                                            <p id="billing_last_name_field"
                                                class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name">Tên<abbr
                                                        title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder=""
                                                    id="billing_last_name" name="billing_last_name" class="input-text ">
                                            </p>
                                            <div class="clear"></div>

                                            <p id="billing_company_field" class="form-row form-row-wide">
                                                <label class="" for="billing_company">Tên công ty   </label>
                                                <input type="text" value="" placeholder="" id="billing_company"
                                                    name="billing_company" class="input-text ">
                                            </p>

                                            <p id="billing_address_1_field"
                                                class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Địa chỉ <abbr
                                                        title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Địa chỉ"
                                                    id="billing_address_1" name="billing_address_1" class="input-text ">
                                            </p>



                                            <p id="billing_city_field"
                                                class="form-row form-row-wide address-field validate-required"
                                                data-o_class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_city">Thị trấn / Thành phố  <abbr
                                                        title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Thị trấn / Thành phố"
                                                    id="billing_city" name="billing_city" class="input-text ">
                                            </p>
                                            <div class="clear"></div>

                                            <p id="billing_email_field"
                                                class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Email Address <abbr
                                                        title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_email"
                                                    name="billing_email" class="input-text ">
                                            </p>

                                            <p id="billing_phone_field"
                                                class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Phone <abbr title="required"
                                                        class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_phone"
                                                    name="billing_phone" class="input-text ">
                                            </p>
                                            <div class="clear"></div>


                                            <div class="create-account">
                                                <p>Create an account by entering the information below. If you are a
                                                    returning customer please login at the top of the page.</p>
                                                <p id="account_password_field" class="form-row validate-required">
                                                    <label class="" for="account_password">Account password <abbr
                                                            title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="password" value="" placeholder="Password"
                                                        id="account_password" name="account_password" class="input-text">
                                                </p>
                                                <div class="clear"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="woocommerce-shipping-fields">
                                            <h3 id="ship-to-different-address">
                                        </div>

                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
