@extends('layouts.app')

@section('content_app')
    <div class="container cart">
        @if (count($cart) > 0)
            <div class="cart__content col-lg-8">
                <div class="cart__content--item">
                    @foreach ($cart as $item)
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <div class="cartItem">
                                <div class="cartItem__image">
                                    <img src="{{ asset('images/Product/' . $item->product->images->first()->path_img) }}"
                                        alt="{{ $item->name_product }}" class="img-fluid rounded">
                                </div>

                                <a href="{{ route('product.detail', ['id' => $item->product->id]) }}"
                                    class="cartItem__info">
                                    <h6 class="cartItem__info--title">{{ $item->name_product }}</h6>
                                    <p class="cartItem__info--description">
                                        {{ implode(' ', array_filter([$item->product->option_cpu, $item->product->option_ram, $item->product->option_hard, $item->product->option_gpu])) }}
                                    </p>
                                </a>

                                <div class="cartItem__quantity">
                                    <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                    <div class="input-group">
                                        <button type="submit" name="action" value="decrease"
                                            class="btn btn-outline-secondary btn-sm">-</button>
                                        <input type="text"
                                            class="form-control form-control-sm text-center quantity-input"
                                            value="{{ $item->count }}" readonly style="max-width: 100px;">
                                        <button type="submit" name="action" value="increase"
                                            class="btn btn-outline-secondary btn-sm">+</button>
                                    </div>
                                </div>

                                <p class="cartItem__price">
                                    {{ number_format($item->price_product * $item->count, 0, ',', '.') }} VND
                                </p>

                                <div class="cartItem__remove">
                                    <button type="submit" name="action" value="remove"
                                        class="btn btn-sm btn-outline-danger">
                                        <i class="cil-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="cart__content--continue mb-4">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i>Tiếp tục mua sắm
                    </a>
                </div>
            </div>
            <div class="cart__summary col-lg-4">
                <div class="cart__summary--item summary">
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
                        <strong>Tổng cộng:</strong>
                        <strong>{{ number_format($total, 0, ',', '.') }} VND</strong>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn btn-primary w-100">Tiến hành thanh toán</a>
                </div>

                <div class="cart__summary--item summary">
                    <h5 class="summary__title">Mã khuyến mãi</h5>
                    <div class="summary__promo">
                        <input type="text" class="form-control summary__promo--input" placeholder="Nhập mã khuyến mãi">
                        <button class="btn btn-outline-secondary summary__promo--button" type="button">Áp dụng</button>
                    </div>
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
@endsection
