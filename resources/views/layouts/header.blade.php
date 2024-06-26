<nav class="nav">
    <div class="container ">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-3 nav-item">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('storage/layout/logo.jpg') }}" alt="Alternate Text" />
                </a>
            </div>
            <div class="col-lg-5 col-md-7 col-6 nav-item">

                <form action="products.php" class="d-flex">
                    <input class="form-control" type="search" name="search" value="" placeholder="Tìm kiếm"
                        aria-label="Search">
                    <button class="btn" type="submit"><i class="fas fa-search search"></i></button>
                </form>
            </div>
            <div class="col-lg-3 col-md-1 col-1 nav-item">

                <?php if(Auth::check()){?>

                <a href="{{ route('profile') }}">
                    <i class="fas fa-user"></i>
                    <span class="item-nav">{{ Auth::user()->name }}</span>
                </a>
                <span> | </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Đăng xuất</button>
                </form>
                <?php } else{?>

                <a href="{{ route('login') }}">
                    <i class="fas fa-user"></i>
                    <span class="item-nav">Đăng nhập/ Đăng ký</span>
                </a>

                <?php }?>
            </div>
            <div class="col-lg-2 col-md-1 col-1 nav-item">

                <a href="{{ route('cart.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="item-nav">Giỏ hàng</span>
                </a>
            </div>
            <div class="col-1 dropdown icon-bar">
                <button class="btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

        </div>
        <div class="row">
            <div class="col-3">
                <div class="nav-sidebar">
                    <i class="fas fa-bars"></i>
                    <a class="product__link" href="{{ route('products.index') }}">DANH MỤC SẢN PHẨM</a>
                    @include('components.product-types')
                </div>
            </div>
            <div class="col-9">
                <div class="nav-menu">
                    <ul class="nav-navbar">
                        <li>
                            <a href="#"><i class="fas fa-wrench"></i> Lắp đặt phòng net</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-money-check"></i> Trả góp</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-money-bill"></i> Bảng giá</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-sliders-h"></i> Xây dựng cấu hình</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-shield-alt"></i> Kiểm tra bảo hành</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-dollar-sign"></i> Thiết bị mining</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </div>
</nav>
