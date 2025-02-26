<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>RETHINK Retail</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/icons/css/all.min.css">
    @vite(['resources/js/app.js'])

</head>

<body class="page">
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="header__main">
                        <a href="index.html" class="header__main--logo">
                            <img src="{{ asset('images/storetech-logo.png') }}">
                        </a>

                        <ul class="header__main--nav list">
                            <li class="list__search-container search">
                                <input type="text" class="form-control search__input" placeholder="Tìm kiếm...">
                                <i class="fas fa-search search__icon"></i>
                            </li>
                            <li class="list__scroll-to-section item"><a class="item__link" href="#">Trang chủ</a></li>
                            <li class="list__submenu item">
                                <a class="item__link" href="#">Danh mục</a>
                                <ul class="item__dropdown">
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Điện thoại</a></li>
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Laptop</a></li>
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Âm thanh</a></li>
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Đồng hồ, Camera</a></li>
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Đồ gia dụng</a></li>
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Phụ kiện</a></li>
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">PC, Màn hình, Máy in</a></li>
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Tivi</a></li>
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Khuyến mãi</a></li>
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Tin công nghệ</a></li>
                                </ul>
                            </li>
                            <li class="list__scroll-to-section item"><a class="item__link" href="#">Liên hệ</a></li>
                            <li class="list__submenu item">
                                <a class="item__link" href="#">Cửa hàng</a>
                                <ul class="item__dropdown">
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Giỏ hàng</a></li>
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Đơn hàng</a></li>
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Voucher</a></li>                              
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Lịch sử mua hàng</a></li>                              
                                    <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Đánh giá</a></li>
                                </ul>
                            </li>
                            <li class="list__submenu item">
                                @guest
                                    <a class="item__link {{ request()->is('login') ? '--active' : '' }}"
                                        href="{{ route('login') }}">Đăng nhập</a>
                                @else
                                    <a class="item__link" href="#">{{ Auth::user()->fullname }}</a>
                                    <ul class="item__dropdown">
                                        <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Thông tin cá nhân</a></li>
                                        <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Thông tin thanh toán</a></li>
                                        <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="#">Địa chỉ nhận hàng</a></li>
                                        <li class="item__dropdown--title"><a class="item__dropdown--title-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Đăng xuất</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            </form>
                                        </li>
                                        
                                    </ul>

                                @endguest
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    @yield('content_app')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 column">
                    <div class="first-item column__item">
                        <div class="column__item--logo">
                            <img src="{{ asset('images/storetech-logo.png') }}">
                        </div>
                        <ul class="column__item--contact">
                            <li><a href="#"><i class="fas fa-map-marker-alt"></i>456 Lê Duẩn, Quận Hải Châu, TP Đà Nẵng</a></li>
                            <li><a href="#"><i class="fas fa-envelope"></i>support@rethinkretail.com</a></li>
                            <li><a href="#"><i class="fas fa-phone"></i>1800-1234</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 column">
                    <h4 class="column__item--title">Danh mục sản phẩm</h4>
                    <ul class="column__item--list">
                        <li><a href="#">Điện thoại</a></li>
                        <li><a href="#">Máy tính bảng</a></li>
                        <li><a href="#">Laptop</a></li>
                        <li><a href="#">PC, Màn hình</a></li>
                        <li><a href="#">Đồng hồ thông minh</a></li>
                        <li><a href="#">Phụ kiện</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 column">
                    <h4 class="column__item--title">Thông tin hữu ích</h4>
                    <ul class="column__item--list">
                        <li><a href="#">Chính sách bảo hành</a></li>
                        <li><a href="#">Chính sách đổi trả</a></li>
                        <li><a href="#">Hướng dẫn mua hàng</a></li>
                        <li><a href="#">Hệ thống cửa hàng</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 column">
                    <h4 class="column__item--title">Hỗ trợ khách hàng</h4>
                    <ul class="column__item--list">
                        <li><a href="#">Trung tâm trợ giúp</a></li>
                        <li><a href="#">Câu hỏi thường gặp</a></li>
                        <li><a href="#">Theo dõi đơn hàng</a></li>
                        <li><a href="#">Liên hệ hỗ trợ</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>
</body>

</html>
