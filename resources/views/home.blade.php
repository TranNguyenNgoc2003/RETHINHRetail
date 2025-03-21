@extends('layouts.app')

@section('content_app')
    <div class="banner" id="top">
        <div class="container-fluid">
            <div class="row banner__content">
                <div class="col-lg-6">
                    <div class="banner__content--left left">
                        <div class="left__thumb">
                            <div class="left__thumb--inner">
                                <h4 class="left__thumb--inner-title">Điện thoại</h4>
                                <span class="left__thumb--inner-description">Công nghệ tiên tiến - Hiệu suất vượt trội</span>
                                <div class="left__thumb--inner-button">
                                    <a href="{{ route('category', ['category' => 'Điện thoại']) }}">Xem ngay</a>
                                </div>
                            </div>
                            <img class="left__thumb--image" src="{{ asset('images/banner_smartphone.png') }}"
                                alt="Điện thoại">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner__content--right">
                        <div class="row">
                            <div class="col-lg-6 ">
                                <div class="right">
                                    <div class="right__thumb">
                                        <div class="right__thumb--inner">
                                            <h4 class="right__thumb--inner-title">Máy tính bảng</h4>
                                            <span class="right__thumb--inner-description">Màn hình lớn - Trải nghiệm mượt
                                                mà</span>
                                        </div>
                                        <div class="right__thumb--hover hover">
                                            <div class="hover__inner">
                                                <h4 class="hover__inner--title">Máy tính bảng</h4>
                                                <p class="hover__inner--description">Khám phá những mẫu máy tính bảng mới
                                                    nhất với hiệu năng mạnh mẽ.</p>
                                                <div class="hover__inner--button">
                                                    <a href="{{ route('category', ['category' => 'Máy tính bảng']) }}">Tìm hiểu thêm</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img class="right__thumb--image" src="{{ asset('images/banner_tablet.png') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right">
                                    <div class="right__thumb">
                                        <div class="right__thumb--inner">
                                            <h4 class="right__thumb--inner-title">Đồng hồ thông minh</h4>
                                            <span class="right__thumb--inner-description">Thiết kế sang trọng - Theo dõi sức
                                                khỏe</span>
                                        </div>
                                        <div class="right__thumb--hover hover">
                                            <div class="hover__inner">
                                                <h4 class="hover__inner--title">Đồng hồ thông minh</h4>
                                                <p class="hover__inner--description">Nhận thông báo, theo dõi sức khỏe và
                                                    nâng cao trải nghiệm sống.</p>
                                                <div class="hover__inner--button">
                                                    <a href="{{ route('category', ['category' => 'Đồng hồ thông minh']) }}">Tìm hiểu thêm</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img class="right__thumb--image" src="{{ asset('images/banner_smartwatch.png') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right">
                                    <div class="right__thumb">
                                        <div class="right__thumb--inner">
                                            <h4 class="right__thumb--inner-title">PC &amp; Màn hình</h4>
                                            <span class="right__thumb--inner-description">Công nghệ tiên tiến - Hiển thị sắc
                                                nét</span>
                                        </div>
                                        <div class="right__thumb--hover hover">
                                            <div class="hover__inner">
                                                <h4 class="hover__inner--title">PC &amp; Màn hình</h4>
                                                <p class="hover__inner--description">Hiệu suất mạnh mẽ, phù hợp cho công
                                                    việc và giải trí.</p>
                                                <div class="hover__inner--button">
                                                    <a href="{{ route('category', ['category' => 'PC & Màn hình']) }}">Tìm hiểu thêm</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img class="right__thumb--image" src="{{ asset('images/banner_pc.png') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right">
                                    <div class="right__thumb">
                                        <div class="right__thumb--inner">
                                            <h4 class="right__thumb--inner-title">Phụ kiện</h4>
                                            <span class="right__thumb--inner-description">Đa dạng - Chất lượng cao</span>
                                        </div>
                                        <div class="right__thumb--hover hover">
                                            <div class="hover__inner">
                                                <h4 class="hover__inner--title">Phụ kiện</h4>
                                                <p class="hover__inner--description">Bảo vệ thiết bị và nâng cao trải nghiệm
                                                    sử dụng.</p>
                                                <div class="hover__inner--button">
                                                    <a href="{{ route('category', ['category' => 'Phụ kiện']) }}">Tìm hiểu thêm</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img class="right__thumb--image" src="{{ asset('images/banner_keyboards.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container product">
        <h3 class="product__title">SẢN PHẨM NỔI BẬT NHẤT</h3>
        <div class="row product__row">
            @foreach ($products->sortByDesc('rating')->unique('name_product')->take(8) as $product)
                @include('components.product', ['products' => $products])
            @endforeach
        </div>
    </div>
    <div class="container product">
        <h3 class="product__title">ĐIỆN THOẠI</h3>
        <div class="row product__row">
            @foreach ($products->where('category', 'Điện thoại')->sortByDesc('rating')->unique('name_product')->take(8) as $product)
                @include('components.product', ['products' => $products])
            @endforeach
        </div>
    </div>
    <div class="container product">
        <h3 class="product__title">LAPTOP</h3>
        <div class="row product__row">
            @foreach ($products->where('category', 'Laptop')->sortByDesc('rating')->unique('name_product')->take(8) as $product)
                @include('components.product', ['products' => $products])
            @endforeach
        </div>
    </div>
    <div class="container product">
        <h3 class="product__title">MÁY TÍNH BẢNG</h3>
        <div class="row product__row">
            @foreach ($products->where('category', 'Máy tính bảng')->sortByDesc('rating')->unique('name_product')->take(8) as $product)
                @include('components.product', ['products' => $products])
            @endforeach
        </div>
    </div>
    <div class="container product">
        <h3 class="product__title">PHỤ KIỆN</h3>
        <div class="row product__row">
            @foreach ($products->where('category', 'Phụ kiện')->sortByDesc('rating')->unique('name_product')->take(8) as $product)
                @include('components.product', ['products' => $products])
            @endforeach
        </div>
    </div>
@endsection
