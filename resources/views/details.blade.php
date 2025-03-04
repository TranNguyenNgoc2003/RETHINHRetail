@extends('layouts.app')

@section('content_app')
    <div class="detailProduct container">
        <div class="row">
            <!-- Product Images -->
            <div class="detailProduct__intro col-md-7">
                <div class="detailProduct__intro--image">
                    <div class="detailProduct__intro--image-main">
                        <img id="mainImage" src="{{ asset('images/Product/' . $product->images->first()->path_img) }}"
                            alt="{{ $product->name_product }}">
                    </div>
                    <div class="detailProduct__intro--image-thumb">
                        @foreach ($product->images->take(8) as $image)
                            <img src="{{ asset('images/Product/' . $image->path_img) }}" alt="{{ $product->name_product }}"
                                onclick="changeImage(event, this.src)">
                        @endforeach
                    </div>
                </div>
                <div class="detailProduct__intro--description introduce">
                    <h4 class="introduce__title">Thông tin sản phẩm</h4>
                    <ul class="introduce__list" id="product-info">
                        @foreach ([
                                'name_product' => 'Tên sản phẩm',
                                'category' => 'Danh mục',
                                'Screen_size' => 'Kích thước màn hình',
                                'Panel_material' => 'Chất liệu màn hình',
                                'Screen_resolution' => 'Độ phân giải màn hình',
                                'Screen_features' => 'Tính năng màn hình',
                                'Screen_ratio' => 'Tỉ lệ màn hình',
                                'Rear_camera' => 'Camera chính',
                                'Video_recording' => 'Quay video',
                                'Camera_features' => 'Tính năng camera',
                                'Front_camera' => 'Camera trước',
                                'CPU' => 'CPU',
                                'GPU' => 'GPU',
                                'RAM_capacity' => 'Dung lượng RAM',
                                'Hard_capacity' => 'Dung lượng bộ nhớ',
                                'Operating_system' => 'Hệ điều hành',
                                'Size' => 'Kích thước',
                                'Weight' => 'Trọng lượng',
                                'Material' => 'Chất liệu',
                                'Tech_Utilities' => 'Công nghệ đặc biệt',
                                'Sound_tech' => 'Công nghệ âm thanh',
                                'Charging_tech' => 'Công nghệ sạc',
                                'WiFi' => 'WiFi',
                                'Bluetooth' => 'Bluetooth',
                                'Pin' => 'Pin',
                                'Release_date' => 'Ngày ra mắt',
                                'Producer' => 'Nhà sản xuất',
                            ] as $key => $label)
                            @if (!empty($product->$key))
                                <li class="introduce__list--item">
                                    <span class="introduce__list--item-title">{{ $label }}:</span>
                                    {{ $product->$key }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <button id="toggle-info" class="introduce__btn btn-show-more">Hiển thị thêm</button>
                </div>
            </div>

            <!-- Product Details -->
            <form class="detailProduct__info col-md-5" action="{{ route('addToCart') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <h2 class="detailProduct__info--title">{{ $product->name_product }}</h2>
                <div class="detailProduct__info--rating rating">
                    <div class="rating__star">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $product->rating ? 'text-warning' : 'text-secondary' }}"></i>
                        @endfor
                    </div>
                    <small class="rating__count">({{ $product->rating }}/5)</small>
                </div>
                <div class="detailProduct__info--options options">
                    @if (count($relatedProducts) > 1)
                        @foreach ($relatedProducts as $item)
                            <a class="options__item{{ $product->id == $item->id ? 'Active' : '' }}"
                                href="{{ route('product.detail', ['id' => $item->id]) }}">
                                @if ($product->id == $item->id)
                                    <i class="cil-check-alt"></i>
                                @endif
                                <div class="options__item--cpu">{{ $item->option_cpu ?? '' }}</div>
                                <div class="options__item--memory">{{ $item->option_ram . ' - ' . $item->option_hard }}</div>
                                <div class="options__item--gpu">{{ $item->option_gpu ?? '' }}</div>
                                <div class="options__item--price">
                                    {{ number_format($item->price * (1 - $product->discount / 100), 0, ',', '.') }} VND
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
                <div class="promotion">
                    <h6 class="promotion__title"> QUÀ TẶNG VÀ ƯU ĐÃI </h6>
                    <ul class="promotion__list">
                        @foreach ($promotion as $itemDiscount)
                            <li class="promotion__list--item">
                                <i class="promotion__list--item-icon cil-check-alt"></i>
                                <a href="#" class="promotion__list--item-link">{{ $itemDiscount->discount }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class=" priceDetailsInfo">
                    <span class="priceDetailsInfo__priceCurrent{{ $product->discount == 0 ? 'Active' : '' }}">
                        {{ number_format(round($product->price - ($product->price / 100) * $product->discount, -5), 0, ',', '.') }}
                        VND
                        <i
                            class="priceDetailsInfo__priceCurrent{{ $product->discount == 0 ? 'Active' : '' }}--icon fas fa-caret-down"></i>

                    </span>
                    @if ($product->price && $product->discount)
                        <span class="priceDetailsInfo__priceUnline">{{ number_format($product->price, 0, ',', '.') }}
                            VND</span>
                    @endif
                </div>
                @if ($product->total_product <= 0)
                <div class="btn btn-outline-danger addCart">
                    <div class="addCart__title">TẠM HẾT HÀNG</div>
                    <div class="addCart__text">(Vui lòng liên hệ 1800-1234)</div>
                </div>
                @else
                <button type="submit" class="btn btn-outline-danger addCart">
                    <i class="addCart__icon fas fa-cart-plus"></i>
                    <div class="addCart__title">Thêm vào giỏ hàng</div>
                </button>
                @endif
                
            </form>
        </div>
    </div>
    @vite(['resources/js/product_detail.js'])
    <script>
        @if (session('success'))
            Swal.fire({
                title: "Thành công!",
                text: "Sản phẩm đã được thêm vào giỏ hàng.",
                icon: "success",
                showCancelButton: true,
                confirmButtonText: "Xem giỏ hàng",
                cancelButtonText: "Tiếp tục mua sắm"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('cart') }}";
                }
            });

            @php session()->forget('success'); @endphp
        @endif

        @if (session('error'))
            Swal.fire({
                title: "Lỗi!",
                text: "{{ session('error') }}",
                icon: "error",
                showCancelButton: true,
                confirmButtonText: "Đăng nhập ngay",
                cancelButtonText: "Ở lại trang"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                }
            });

            @php session()->forget('error'); @endphp
        @endif
    </script>
@endsection
