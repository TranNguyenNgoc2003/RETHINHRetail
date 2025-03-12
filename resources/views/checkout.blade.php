@extends('layouts.app')

@section('content_app')
    <div class="container shopping">
        <div class="row">
            @if (count($checkout) > 0)
                <form action="{{ route('checkout.confirm', ['orderId' => $order->id]) }}" method="POST">
                    @csrf
                    <div class="shopping__formInfo">
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
                                            <p class="checkout__item--content-text">Vui lòng kiểm tra lại thông tin giao đảm
                                                bảo chính xác.</p>
                                            <div class="shipping">
                                                <div class="shipping__info">
                                                    <h5 class="shipping__info--title">Địa chỉ giao hàng</h5>
                                                    @if ($selectedAddress)
                                                        <span
                                                            class="shipping__info--name">{{ $selectedAddress->fullname }}</span>
                                                        <span
                                                            class="shipping__info--address">{{ $selectedAddress->address }}</span>
                                                        <span
                                                            class="shipping__info--phone">{{ $selectedAddress->phone }}</span>
                                                    @else
                                                        <span class="shipping__info--desciption">Hãy chọn địa chỉ giao
                                                            hàng</span>
                                                    @endif
                                                </div>
                                                <a href="{{ route('shipping.index', ['orderId' => $order->id]) }}"
                                                    class="shipping__change">
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
                                                <p class="checkout__item--content-text">Thông tin thanh toán của bạn sẽ được
                                                    bảo mật tuyệt đối.</p>
                                            </div>
                                            <div class="row optionPayment">
                                                <h5 class="optionPayment__title font-size-14 mb-3">Phương thức thanh toán:
                                                </h5>
                                                <div class="optionPayment__method">
                                                    @foreach ($payments as $payment)
                                                        <div class="optionPayment__method--item method">
                                                            <label class="method__label">
                                                                <input type="radio" name="pay-method" id="pay-method"
                                                                    class="method__label--radio"
                                                                    {{ $loop->first ? 'checked' : '' }}
                                                                    value="{{ $payment->id }}">
                                                                <div class="method__label--content">
                                                                    <div class="method__label--content-image">
                                                                        <img src="{{ asset('images/' . $payment->path_logo) }}"
                                                                            alt="{{ $payment->method }}">
                                                                    </div>
                                                                    <p> {{ $payment->description }}</p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="checkout__item">
                                        <div class="avatar checkout__item--icon">
                                            <div class="avatar__title">
                                                <i class="fas fa-comment-alt"></i>
                                            </div>
                                        </div>
                                        <div class="checkout__item--content">
                                            <div class="row">
                                                <h5 class="checkout__item--content-title">Ghi chú</h5>
                                                <p class="checkout__item--content-text">Bạn có ghi chú gì cho đơn hàng này không?</p>
                                            </div>
                                            <div class="row">
                                                <textarea name="order_note" class="form-control" rows="3" placeholder="Nhập ghi chú của bạn ở đây..."></textarea>
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
                    <div class="shopping__summary checkout-summary">
                        @foreach ($detailOrder as $item)
                            <div class="checkout-summary__item">
                                <span class="checkout-summary__item--image">
                                    <img src="{{ asset('images/Product/' . $item->cart->product->images->first()->path_img) }}"
                                        alt="{{ $item->name_product }}" class="checkout-summary__item--image-img">
                                </span>
                                <span class="checkout-summary__item--info">
                                    <h6 class="checkout-summary__item--info-title">{{ $item->name_product }}</h6>
                                    <p class="checkout-summary__item--info-description">
                                        {{ implode(' ', array_filter([$item->option_cpu, $item->option_ram, $item->option_hard, $item->option_gpu])) }}
                                    </p>
                                </span>
                            </div>
                            <div class="checkout-summary__item">
                                <span class="checkout-summary__item--text">Giá tiền:</span>
                                <span class="checkout-summary__item--quantity">
                                    {{ number_format(round($item->cart->product->price - ($item->cart->product->price / 100) * $item->cart->product->discount, -5), 0, ',', '.') }}
                                    VND x {{ $item->cart->count }}
                                </span>
                            </div>
                            <div class="checkout-summary__item">
                                <span class="checkout-summary__item--text">Tổng cộng:</span>
                                <p class="checkout-summary__item--price">
                                    {{ number_format($item->total_price, 0, ',', '.') }} VND
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
                                <span>{{ number_format($order->shipping_fee, 0, ',', '.') }} VND</span>
                            </div>
                            <div class="summary__title--item">
                                <span>Giảm giá:</span>
                                <span>{{ number_format($order->discount, 0, ',', '.') }} VND</span>
                            </div>
                            <hr>
                            <div class="summary__title--item">
                                <strong>Tổng số tiền thanh toán:</strong>
                                <strong>{{ number_format($order->total_price, 0, ',', '.') }} VND</strong>
                            </div>
                            <button class="btn btn-primary w-100">Xác nhận đơn hàng</button>
                        </div>
                    </div>
                </form>
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
