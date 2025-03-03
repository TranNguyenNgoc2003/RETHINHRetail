@extends('layouts.app')

@section('content_app')
    <form class="detailProduct container" action="" method="POST">
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
                    <ul class="introduce__list">
                        @if ($product->Screen_size)
                            <li class="introduce__list--item">
                                <p>Kích thước màn hình:</p>
                                {{ $product->Screen_size }} inches
                            </li>
                        @endif
                        @if ($product->Panel_material)
                            <li class="introduce__list--item">
                                <p>Chất liệu màn hình:</p>
                                {{ $product->Panel_material }}
                            </li>
                        @endif
                        @if ($product->Screen_resolution)
                            <li class="introduce__list--item">
                                <p>Độ phân giải màn hình:</p>
                                {{ $product->Screen_resolution }}
                            </li>
                        @endif
                        @if ($product->Screen_features)
                            <li class="introduce__list--item">
                                <p>Tính năng màn hình:</p>
                                {{ $product->Screen_features }}
                            </li>
                        @endif
                        @if ($product->Screen_ratio)
                            <li class="introduce__list--item">
                                <p>Tỉ lệ màn hình:</p>
                                {{ $product->Screen_ratio }}
                            </li>
                        @endif
                        @if ($product->Rear_camera)
                            <li class="introduce__list--item">
                                <p>Camera chính:</p>
                                {{ $product->Rear_camera }}
                            </li>
                        @endif
                        @if ($product->Video_recording)
                            <li class="introduce__list--item">
                                <p>Quay video:</p>
                                {{ $product->Video_recording }}
                            </li>
                        @endif
                        @if ($product->Camera_features)
                            <li class="introduce__list--item">
                                <p>Tính năng camera:</p>
                                {{ $product->Camera_features }}
                            </li>
                        @endif
                        @if ($product->Front_camera)
                            <li class="introduce__list--item">
                                <p>Camera trước:</p>
                                {{ $product->Front_camera }}
                            </li>
                        @endif
                        @if ($product->Record_video_first)
                            <li class="introduce__list--item">
                                <p>Quay video camera trước:</p>
                                {{ $product->Record_video_first }}
                            </li>
                        @endif
                        @if ($product->CPU)
                            <li class="introduce__list--item">
                                <p>CPU:</p>
                                {{ $product->CPU }}
                            </li>
                        @endif
                        @if ($product->GPU)
                            <li class="introduce__list--item">
                                <p>GPU:</p>
                                {{ $product->GPU }}
                            </li>
                        @endif
                        @if ($product->NFC)
                            <li class="introduce__list--item">
                                <p>NFC:</p>
                                {{ $product->NFC }}
                            </li>
                        @endif
                        @if ($product->SIM_card)
                            <li class="introduce__list--item">
                                <p>Loại SIM:</p>
                                {{ $product->SIM_card }}
                            </li>
                        @endif
                        @if ($product->Network_support)
                            <li class="introduce__list--item">
                                <p>Hỗ trợ mạng:</p>
                                {{ $product->Network_support }}
                            </li>
                        @endif
                        @if ($product->GPS)
                            <li class="introduce__list--item">
                                <p>GPS:</p>
                                {{ $product->GPS }}
                            </li>
                        @endif
                        @if ($product->RAM_capacity)
                            <li class="introduce__list--item">
                                <p>Dung lượng RAM:</p>
                                {{ $product->RAM_capacity }}
                            </li>
                        @endif
                        @if ($product->RAM_Type)
                            <li class="introduce__list--item">
                                <p>Loại RAM:</p>
                                {{ $product->RAM_Type }}
                            </li>
                        @endif
                        @if ($product->RAM_slots)
                            <li class="introduce__list--item">
                                <p>Khe cắm RAM:</p>
                                {{ $product->RAM_slots }}
                            </li>
                        @endif
                        @if ($product->Hard_drive)
                            <li class="introduce__list--item">
                                <p>Ổ cứng:</p>
                                {{ $product->Hard_drive }}
                            </li>
                        @endif
                        @if ($product->Operating_system)
                            <li class="introduce__list--item">
                                <p>Hệ điều hành:</p>
                                {{ $product->Operating_system }}
                            </li>
                        @endif
                        @if ($product->Case_type)
                            <li class="introduce__list--item">
                                <p>Loại vỏ:</p>
                                {{ $product->Case_type }}
                            </li>
                        @endif
                        @if ($product->Size)
                            <li class="introduce__list--item">
                                <p>Kích thước:</p>
                                {{ $product->Size }}
                            </li>
                        @endif
                        @if ($product->Weight)
                            <li class="introduce__list--item">
                                <p>Trọng lượng:</p>
                                {{ $product->Weight }}
                            </li>
                        @endif
                        @if ($product->Material)
                            <li class="introduce__list--item">
                                <p>Chất liệu:</p>
                                {{ $product->Material }}
                            </li>
                        @endif
                        @if ($product->Compatibility)
                            <li class="introduce__list--item">
                                <p>Tương thích:</p>
                                {{ $product->Compatibility }}
                            </li>
                        @endif
                        @if ($product->Resistance)
                            <li class="introduce__list--item">
                                <p>Khả năng chống chịu:</p>
                                {{ $product->Resistance }}
                            </li>
                        @endif
                        @if ($product->Tech_Utilities)
                            <li class="introduce__list--item">
                                <p>Công nghệ đặc biệt:</p>
                                {{ $product->Tech_Utilities }}
                            </li>
                        @endif
                        @if ($product->Other_utilities)
                            <li class="introduce__list--item">
                                <p>Tiện ích khác:</p>
                                {{ $product->Other_utilities }}
                            </li>
                        @endif
                        @if ($product->Sound_tech)
                            <li class="introduce__list--item">
                                <p>Công nghệ âm thanh:</p>
                                {{ $product->Sound_tech }}
                            </li>
                        @endif
                        @if ($product->Charging_tech)
                            <li class="introduce__list--item">
                                <p>Công nghệ sạc:</p>
                                {{ $product->Charging_tech }}
                            </li>
                        @endif
                        @if ($product->Charging_port)
                            <li class="introduce__list--item">
                                <p>Cổng sạc:</p>
                                {{ $product->Charging_port }}
                            </li>
                        @endif
                        @if ($product->Communication_port)
                            <li class="introduce__list--item">
                                <p>Cổng kết nối:</p>
                                {{ $product->Communication_port }}
                            </li>
                        @endif
                        @if ($product->Power_consumption)
                            <li class="introduce__list--item">
                                <p>Mức tiêu thụ điện:</p>
                                {{ $product->Power_consumption }}
                            </li>
                        @endif
                        @if ($product->Types_sensors)
                            <li class="introduce__list--item">
                                <p>Cảm biến:</p>
                                {{ $product->Types_sensors }}
                            </li>
                        @endif
                        @if ($product->WiFi)
                            <li class="introduce__list--item">
                                <p>WiFi:</p>
                                {{ $product->WiFi }}
                            </li>
                        @endif
                        @if ($product->Bluetooth)
                            <li class="introduce__list--item">
                                <p>Bluetooth:</p>
                                {{ $product->Bluetooth }}
                            </li>
                        @endif
                        @if ($product->Pin)
                            <li class="introduce__list--item">
                                <p>Pin:</p>
                                {{ $product->Pin }}
                            </li>
                        @endif
                        @if ($product->Health_benefits)
                            <li class="introduce__list--item">
                                <p>Lợi ích sức khỏe:</p>
                                {{ $product->Health_benefits }}
                            </li>
                        @endif
                        @if ($product->Release_date)
                            <li class="introduce__list--item">
                                <p>Ngày ra mắt:</p>
                                {{ $product->Release_date }}
                            </li>
                        @endif
                        @if ($product->Producer)
                            <li class="introduce__list--item">
                                <p>Nhà sản xuất:</p>
                                {{ $product->Producer }}
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- Product Details -->
            <div class="detailProduct__info col-md-5">
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
                    @foreach ($relatedProducts as $item)
                        <a class="options__item{{ $product->id == $item->id ? 'Active' : '' }}"
                            href="{{ route('product.detail', ['id' => $item->id]) }}">
                            @if ($product->id == $item->id)
                                <i class="cil-check-alt"></i>
                            @endif
                            @if ($item->options_CPU)
                                <div class="options__item--cpu">{{ $item->options_CPU }}</div>
                            @endif
                            @if ($item->options_RAM && $item->options_HARD)
                                <div class="options__item--memory">{{ $item->options_RAM . ' - ' . $item->options_HARD }}
                                </div>
                            @elseif ($item->options_RAM && !$item->options_HARD)
                                <div class="options__item--memory">{{ $item->options_RAM }}</div>
                            @elseif (!$item->options_RAM && $item->options_HARD)
                                <div class="options__item--memory">{{ $item->options_HARD }}</div>
                            @endif
                            @if ($item->options_GPU)
                                <div class="options__item--gpu">{{ $item->options_GPU }}</div>
                            @endif
                            <div class="options__item--price">
                                {{ number_format(round($item->price - ($item->price / 100) * $product->discount, -5), 0, ',', '.') }}
                                VND</div>

                        </a>
                    @endforeach
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
                <button type="submit" class="btn btn-outline-danger addCart">
                    <i class="addCart__icon fas fa-cart-plus"></i>
                    <div class="addCart__text">Thêm vào giỏ hàng</div>
                </button>
            </div>
        </div>
    </form>
    <script>
        function changeImage(event, src) {
            document.getElementById('mainImage').src = src;
            document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
            event.target.classList.add('active');
        }
    </script>
@endsection
