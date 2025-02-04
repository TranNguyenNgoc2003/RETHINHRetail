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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="index.html" class="logo">
                            <img src="{{ asset('images/storetech-logo.png') }}">
                        </a>

                        <ul class="nav">
                            <li class="search-container">
                                <input type="text" class="form-control search-input" placeholder="Tìm kiếm...">
                                <i class="fas fa-search search-icon"></i>
                            </li>
                            <li class="scroll-to-section"><a href="#">Trang chủ</a></li>
                            <li class="submenu">
                                <a href="#">Danh mục</a>
                                <ul>
                                    <li><a href="#">Điện thoại</a></li>
                                    <li><a href="#">Laptop</a></li>
                                    <li><a href="#">Âm thanh</a></li>
                                    <li><a href="#">Đồng hồ, Camera</a></li>
                                    <li><a href="#">Đồ gia dụng</a></li>
                                    <li><a href="#">Phụ kiện</a></li>
                                    <li><a href="#">PC, Màn hình, Máy in</a></li>
                                    <li><a href="#">Tivi</a></li>
                                    <li><a href="#">Khuyến mãi</a></li>
                                    <li><a href="#">Tin công nghệ</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="#">Liên hệ</a></li>
                            <li class="submenu">
                                <a href="#">Cửa hàng</a>
                                <ul>
                                    <li><a href="#">Giỏ hàng</a></li>
                                    <li><a href="#">Đơn hàng</a></li>
                                    <li><a href="#">Voucher</a></li>                              
                                    <li><a href="#">Lịch sử mua hàng</a></li>                              
                                    <li><a href="#">Đánh giá</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                @guest
                                    <a class=" {{ request()->is('login') ? 'active' : '' }}"
                                        href="{{ route('login') }}">Đăng nhập</a>
                                @else
                                    <a href="#">{{ Auth::user()->fullname }}</a>
                                    <ul>
                                        <li><a href="#">Thông tin cá nhân</a></li>
                                        <li><a href="#">Thông tin thanh toán</a></li>
                                        <li><a href="#">Địa chỉ nhận hàng</a></li>
                                        <li><a href="{{ route('logout') }}"
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

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="{{ asset('images/storetech-logo.png') }}">
                        </div>
                        <ul>
                            <li><a href="#"><i class="fas fa-map-marker-alt"></i>456 Lê Duẩn, Quận Hải Châu, TP Đà Nẵng</a></li>
                            <li><a href="#"><i class="fas fa-envelope"></i>support@rethinkretail.com</a></li>
                            <li><a href="#"><i class="fas fa-phone"></i>1800-1234</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Danh mục sản phẩm</h4>
                    <ul>
                        <li><a href="#">Điện thoại</a></li>
                        <li><a href="#">Máy tính bảng</a></li>
                        <li><a href="#">Laptop</a></li>
                        <li><a href="#">PC, Màn hình</a></li>
                        <li><a href="#">Đồng hồ thông minh</a></li>
                        <li><a href="#">Phụ kiện</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Thông tin hữu ích</h4>
                    <ul>
                        <li><a href="#">Chính sách bảo hành</a></li>
                        <li><a href="#">Chính sách đổi trả</a></li>
                        <li><a href="#">Hướng dẫn mua hàng</a></li>
                        <li><a href="#">Hệ thống cửa hàng</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Hỗ trợ khách hàng</h4>
                    <ul>
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
