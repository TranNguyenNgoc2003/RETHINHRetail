@extends('layouts.app')

@section('content_app')
    <div class="container shopping">
        <div class="row">
            @if (count($checkout) > 0)
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card__body">
                            <ul class="card__body--checkout checkout">
                                <li class="checkout__item">
                                    <div class="avatar checkout__item--icon">
                                        <div class="avatar__title">
                                            <i class="fas fa-truck"></i>
                                        </div>
                                    </div>
                                    <div class="checkout__item--content">
                                        <h5 class="checkout__item--content-title">Thông tin vận chuyển</h5>
                                        <p class="checkout__item--content-text">Vui lòng kiểm tra lại thông tin giao hàng để
                                            đảm
                                            bảo chính xác.</p>
                                        <div class="shipping">
                                            <div class="shipping__info">
                                                <h5 class="shipping__info--title">Địa chỉ giao hàng</h5>
                                                @if ($selectedAddress)
                                                    <span
                                                        class="shipping__info--name">{{ $selectedAddress->fullname }}</span>
                                                    <span
                                                        class="shipping__info--address">{{ $selectedAddress->address }}</span>
                                                    <span class="shipping__info--phone">{{ $selectedAddress->phone }}</span>
                                                @else
                                                <span
                                                class="shipping__info--desciption">Hãy chọn địa chỉ giao hàng</span>
                                                @endif

                                            </div>
                                            <a href="{{ route('shipping.index') }}" class="shipping__change">
                                                <i class="fas fa-edit"></i>
                                                <span>Thay đổi địa chỉ giao hàng</span>
                                            </a>
                                        </div>

                                    </div>
                                </li>
                                <li class="checkout__item">
                                    <div class="avatar checkout__item--icon">
                                        <div class="avatar__title">
                                            <i class="fas fa-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="checkout__item--content">
                                        <div class="row">
                                            <h5 class="checkout__item--content-title">Thông tin thanh toán</h5>
                                            <p class="checkout__item--content-text">Thông tin thanh toán của bạn sẽ được bảo
                                                mật tuyệt đối.</p>
                                        </div>
                                        <div class="row optionPayment">
                                            <h5 class="optionPayment__title font-size-14 mb-3">Phương thức thanh toán:</h5>
                                            <div class="optionPayment__method">
                                                <div class="optionPayment__method--item method">
                                                    <label class="method__label">
                                                        <input type="radio" name="pay-method" id="pay-methodoption1"
                                                            class="method__label--radio" checked="">
                                                        <div class="method__label--content">
                                                            <div class="method__label--content-image">
                                                                <img src="{{ asset('images/visa-mastercard-logos.png') }}"
                                                                    alt="">
                                                            </div>
                                                            <p> Thẻ tín dụng/ghi nợ </p>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="optionPayment__method--item method">
                                                    <label class="method__label">
                                                        <input type="radio" name="pay-method" id="pay-methodoption1"
                                                            class="method__label--radio">
                                                        <div class="method__label--content">
                                                            <div class="method__label--content-image">
                                                                <img src="{{ asset('images/Logo-VNPAY-QR.png') }}"
                                                                    alt="">
                                                            </div>
                                                            <p>Ví điện tử VNPAY</p>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="optionPayment__method--item method">
                                                    <label class="method__label">
                                                        <input type="radio" name="pay-method" id="pay-methodoption1"
                                                            class="method__label--radio">
                                                        <div class="method__label--content">
                                                            <div class="method__label--content-image">
                                                                <img src="{{ asset('images/cash-on-delivery.png') }}"
                                                                    alt="">
                                                            </div>
                                                            <p>Thanh toán khi nhận hàng</p>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="checkout-actions">
                        <div class="checkout-actions__item">
                            <a href="{{ route('cart') }}" class="checkout-actions__item--back">
                                <i class="fas fa-arrow-left"></i>
                                <span>Quay lại giỏ hàng</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="checkout-summary col-lg-4">
                    @foreach ($checkout as $item)
                        <div class="checkout-summary__item">
                            <span class="checkout-summary__item--image">
                                <img src="{{ asset('images/Product/' . $item->product->images->first()->path_img) }}"
                                    alt="{{ $item->name_product }}" class="checkout-summary__item--image-img">
                            </span>

                            <span class="checkout-summary__item--info">
                                <h6 class="checkout-summary__item--info-title">{{ $item->name_product }}</h6>
                                <p class="checkout-summary__item--info-description">
                                    {{ implode(' ', array_filter([$item->product->option_cpu, $item->product->option_ram, $item->product->option_hard, $item->product->option_gpu])) }}
                                </p>
                            </span>
                        </div>
                        <div class="checkout-summary__item">
                            <span class="checkout-summary__item--text">Giá tiền:</span>
                            <span class="checkout-summary__item--quantity">
                                {{ number_format(round($item->product->price - ($item->product->price / 100) * $item->product->discount, -5), 0, ',', '.') }}
                                VND x {{ $item->count }}
                            </span>

                        </div>
                        <div class="checkout-summary__item">
                            <span class="checkout-summary__item--text">Tổng cộng:</span>
                            <p class="checkout-summary__item--price">
                                {{ number_format($item->price_product * $item->count, 0, ',', '.') }} VND
                            </p>
                        </div>
                        <p class="checkout-summary__line"></p>
                    @endforeach

                    <div class="summary">
                        <h5 class="summary__title">Tóm tắt đơn hàng</h5>
                        <div class="summary__title--item">
                            <span>Tổng cộng:</span>
                            <span>{{ number_format($subtotal, 0, ',', '.') }} VND</span>
                        </div>
                        <div class="summary__title--item">
                            <span>Vận chuyển:</span>
                            <span>{{ number_format($shipping_fee, 0, ',', '.') }} VND</span>
                        </div>
                        <div class="summary__title--item">
                            <span>Giảm giá:</span>
                            <span>{{ number_format($discount, 0, ',', '.') }} VND</span>
                        </div>
                        <hr>
                        <div class="summary__title--item">
                            <strong>Tổng số tiền thanh toán:</strong>
                            <strong>{{ number_format($total, 0, ',', '.') }} VND</strong>
                        </div>
                        <button class="btn btn-primary w-100">Xác nhận đơn hàng</button>
                    </div>

                </div>
            @elseif (!Auth::check())
                <div class="cart__content--title">
                    <h4>Hãy đăng nhập để tiếp tục mua sắm</h4>
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i>Đăng nhập ngay
                    </a>
                </div>
            @else
                <div class="cart__content--title">
                    <h4>Giỏ hàng của bạn đang trống</h4>
                    <a href="{{ route('home') }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i>Tiếp tục mua sắm
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
