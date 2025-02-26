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
                                    <a href="#">Xem ngay</a>
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
                                                    <a href="#">Tìm hiểu thêm</a>
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
                                                    <a href="#">Tìm hiểu thêm</a>
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
                                                    <a href="#">Tìm hiểu thêm</a>
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
                                                    <a href="#">Tìm hiểu thêm</a>
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
        <div class="row">
            @foreach ($products->sortByDesc('rating')->take(8) as $product)
                <div class="col-md-3 product__col">
                    <div class="product__card">
                        @if ($product->discount)
                            <span class="product__card--badge">Giảm {{ $product->discount }}%</span>
                        @endif
                        <div class="product__card--image">
                            <img alt="{{ $product->name_product }}"
                                src="{{ asset('images/Product/' . $product->images->first()->path_img) }}">
                        </div>
                        <div class="product__card--content">
                            <div class="product__card--content-title">{{ $product->name_product }}</div>
                            <div class="product__card--content-rating rating">
                                <div class="rating__star">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $product->rating ? 'text-warning' : 'text-secondary' }}"></i>
                                    @endfor
                                </div>
                                <small class="rating__count">({{ $product->rating }}/5)</small>
                            </div>
                            <p class="product__card--content-description">{{ $product->description }}</p>
                            <div class="product__card--content-priceInfo priceInfo">
                                <span class="priceInfo__priceCurrent">
                                    {{ number_format(round($product->price - ($product->price / 100) * $product->discount, -3), 0, ',', '.') }}
                                    VND
                                </span>
                                @if ($product->price && $product->discount)
                                    <span class="priceInfo__priceUnline">{{ number_format($product->price, 0, ',', '.') }}
                                        VND</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
