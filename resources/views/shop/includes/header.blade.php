<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-user"></i>Tài khoản của tôi</a></li>
                        <li><a href="#"><i class="fa fa-heart"></i>Danh sách yêu thích </a></li>
                        <li><a href="{{route('cart.index')}}"><i class="fa fa-user"></i>Giỏ hàng của tôi</a></li>
                        <li><a href="{{route('login.index')}}"><i class="fa fa-user"></i>Đăng nhập </a></li>
                        <li><a href="{{route('login.index')}}"><i class="fa fa-user"></i>Đăng xuất </a></li>
                        <li><a href="#"><i class="fa fa-user"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
            </div>
        </div>
    </div>
</div>
<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="./"><img src="{{asset('shop/ustora/img/logo.png')}}"></a></h1>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="{{route('cart.index')}}">Cart - <span class="cart-amunt">$300</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
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
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href= "{{route('shop.index')}}">Trang  chủ</a></li>
                    <li><a href="cart.html">Giỏ hàng </a></li>
                    <li><a href="checkout.html">Thanh toán</a></li>
                    <li><a href="#">Liên hệ </a></li>

                </ul>

            </div>
        </div>
    </div>
</div>
