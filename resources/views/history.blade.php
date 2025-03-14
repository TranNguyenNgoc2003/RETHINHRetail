@extends('layouts.app')

@section('content_app')
    <div class="history container">
        <h3 class="history__title">Lịch sử đơn hàng</h3>
        @if (!empty($lables_details))
            @foreach ($lables_details as $lables_detail)
                <div class="order-card">
                    <div class="order-card__image">
                        <img src="{{ asset('images/Product/' . $lables_detail['path_img']) }}" alt="">
                    </div>
                    <div class="order-card__body">
                        <div class="order-card__header ">
                            <h5 class="order-card__title">
                                {{ $lables_detail['name_product'] }}
                                @if ($lables_detail['extend_count'] > 0)
                                    <span class="order-card__subtitle">
                                        và {{ $lables_detail['extend_count'] }} sản phẩm khác
                                    </span>
                                @endif
                            </h5>
                            <span class="order-card__status">{{ $lables_detail['shipping_status'] }}</span>
                        </div>
                        <div class="order-card__specs specs-grid">
                            <div class="specs-grid__item w-100">
                                <span class="specs-grid__label">Ngày đặt hàng:</span>
                                <span class="specs-grid__value">
                                    {{ $lables_detail['created_at'] }}
                                </span>
                            </div>
                        </div>
                        <div class="order-card__specs specs-grid">
                            <div class="specs-grid__info">
                                <div class="specs-grid__item">
                                    <span class="specs-grid__label">Người nhận:</span>
                                    <span class="specs-grid__value">
                                        {{ $lables_detail['full_name'] }}
                                    </span>
                                </div>
                                <div class="specs-grid__item">
                                    <span class="specs-grid__label">Số điện thoại:</span>
                                    <span class="specs-grid__value">
                                        {{ $lables_detail['phone'] }}
                                    </span>
                                </div>
                                <div class="specs-grid__item">
                                    <span class="specs-grid__label">Tổng đơn hàng:</span>
                                    <span class="specs-grid__value">
                                        {{ number_format($lables_detail['total_price'], 0, ',', '.') }} VND
                                    </span>
                                </div>
                            </div>
                            <div class="specs-grid__delivery">
                                <div class="specs-grid__item w-100">
                                    <span class="specs-grid__label">Địa chỉ giao hàng:</span>
                                    <span class="specs-grid__value">
                                        {{ $lables_detail['address'] }}
                                    </span>
                                </div>
                            </div>
                            @if ($lables_detail['status'])
                                <div class="specs-grid__status">
                                    <div class="specs-grid__item">
                                        <span class="specs-grid__label">Ghi chú:</span>
                                        <span class="specs-grid__value">
                                            {{ $lables_detail['status'] }}
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="order-card__button ">
                            <button class="btn btn-outline-danger mt-3" data-bs-toggle="modal"
                                data-bs-target="#orderModal{{ $lables_detail['id'] }}">
                                Xem chi tiết
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal fade order-modal" id="orderModal{{ $lables_detail['id'] }}" tabindex="-1"
                    aria-labelledby="orderModalLabel{{ $lables_detail['id'] }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content order-modal__content">
                            <div class="modal-header order-modal__header">
                                <h5 class="modal-title order-modal__title" id="orderModalLabel">Chi tiết đơn hàng</h5>
                                <button type="button" class="order-modal__close btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body order-modal__body">
                                <div class="shipping-details">
                                    <div class="shipping-details__title">
                                        <div class="shipping-details__title--text shipping-details__body">
                                            <div class="shipping-details__body--title">Mã đơn hàng:</div>
                                            <p class="shipping-details__body--info">
                                                #{{ $lables_detail['id'] }}
                                            </p>
                                        </div>
                                        <div class="shipping-details__title--text shipping-details__body">
                                            <div class="shipping-details__body--title">Ngày đặt hàng:</div>
                                            <p class="shipping-details__body--info">
                                                {{ $lables_detail['created_at'] }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="shipping-details__name">
                                        <div class="shipping-details__name--text shipping-details__body ">
                                            <div class="shipping-details__body--title">Người nhận:</div>
                                            <p class="shipping-details__body--info">
                                                {{ $lables_detail['full_name'] }}
                                            </p>
                                        </div>
                                        <div class="shipping-details__name--text shipping-details__body">
                                            <div class="shipping-details__body--title">Số điện thoại:</div>
                                            <p class="shipping-details__body--info">
                                                {{ $lables_detail['phone'] }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="shipping-details__body">
                                        <div class="shipping-details__body--title">Địa chỉ giao hàng:</div>
                                        <p class="shipping-details__body--info">
                                            {{ $lables_detail['address'] }}
                                        </p>
                                    </div>
                                    <div class="shipping-details__body">
                                        <div class="shipping-details__body--title">Ghi chú:</div>
                                        <p class="shipping-details__body--info">
                                            {{ $lables_detail['status'] }}
                                        </p>
                                    </div>
                                    <div class="line-history"></div>
                                    <div class="shipping-details__body">
                                        <div class="shipping-details__body--title">Tổng đơn hàng:</div>
                                        <p class="shipping-details__body--info">
                                            {{ number_format($lables_detail['total_price'], 0, ',', '.') }} VND
                                        </p>
                                    </div>
                                    <div class="shipping-details__body">
                                        <div class="shipping-details__body--title">Vận chuyển:</div>
                                        <p class="shipping-details__body--info">
                                            {{ $lables_detail['shipping_fee'] }}
                                        </p>
                                    </div>
                                    <div class="shipping-details__body">
                                        <div class="shipping-details__body--title">Giảm giá:</div>
                                        <p class="shipping-details__body--info">
                                            {{ number_format($lables_detail['discount'], 0, ',', '.') }} VND
                                        </p>
                                    </div>
                                    <div class="shipping-details__body">
                                        <div class="shipping-details__body--title">Tổng số tiền thanh toán:</div>
                                        <p class="shipping-details__body--info">
                                            {{ number_format($lables_detail['total_price'] - $lables_detail['discount'] + $lables_detail['shipping_fee'], 0, ',', '.') }}
                                            VND
                                        </p>
                                    </div>
                                    <div class="shipping-details__body">
                                        <div class="shipping-details__body--title">Phương thức thanh toán:</div>
                                        <p class="shipping-details__body--info">
                                            {{ $lables_detail['payment_method'] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="line-history"></div>
                                @foreach ($details as $detail)
                                    @if ($detail['id'] == $lables_detail['id'])
                                        <div class="product-details">
                                            <span class="product-details__image">
                                                <img src="{{ asset('images/Product/' . $detail['path_img']) }}"
                                                    alt="" class="product-details__image--img">
                                            </span>
                                            <div class="product-details__item">
                                                <span class="product-details__item--info">
                                                    <div class="product-details__item--info-title">
                                                        {{ $detail['name_product'] }}
                                                    </div>
                                                    <p class="product-details__item--info-description">
                                                        {{ $detail['option_cpu'] }} {{ $detail['option_ram'] }}
                                                        {{ $detail['option_hard'] }} {{ $detail['option_gpu'] }}
                                                    </p>
                                                </span>
                                                <span class="product-details__item--price">
                                                    <div class="product-details__item--price-title">
                                                        Giá tiền:
                                                    </div>
                                                    <p class="product-details__item--price-description">
                                                        {{ number_format($detail['product_price'], 0, ',', '.') }} VND x
                                                        {{ $detail['count'] }}
                                                    </p>
                                                </span>
                                                <span class="product-details__item--price">
                                                    <div class="product-details__item--price-title">
                                                        Tổng cộng:
                                                    </div>
                                                    <p class="product-details__item--price-description">
                                                        {{ number_format($detail['product_price'] * $detail['count'], 0, ',', '.') }}
                                                        VND
                                                    </p>
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="modal-footer order-modal__footer">
                                <button type="button" class="btn btn-outline-primary order-modal__close-btn"
                                    data-bs-dismiss="modal">Quay lại</button>
                                <button type="button" class="btn btn-outline-danger order-modal__download-btn">
                                    Tạo lại đơn hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @elseif (!Auth::check())
            <div class="cart__content--title">
                <h4>Hãy đăng nhập để tiếp tục mua sắm</h4>
                <a href="{{ route('login') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-2"></i>Đăng nhập ngay
                </a>
            </div>
        @else
            <div class="cart__content--title">
                <h4>Lịch sử đơn hàng của bạn đang trống</h4>
                <a href="{{ route('home') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-2"></i>Tiếp tục mua sắm
                </a>
            </div>
        @endif

    </div>
@endsection
