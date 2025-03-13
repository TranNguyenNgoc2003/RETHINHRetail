@extends('layouts.app')

@section('content_app')
    <div class="history container">
        <h3 class="history__title">Lịch sử đơn hàng</h3>
        <div class="order-card">
            <div class="order-card__image">
                <img src="{{ asset('images/Product/asus-rog-strix-g16-1.jpg') }}" alt="">
            </div>
            <div class="order-card__body">
                <div class="order-card__header ">
                    <h5 class="order-card__title">
                        ASUS ROG Strix G16 (2024)
                        <span class="order-card__subtitle">và 1 sản phẩm khác</span>
                    </h5>
                    <span class="order-card__status">Đã giao hàng</span>
                </div>
                <div class="order-card__specs specs-grid">
                    <div class="specs-grid__item">
                        <span class="specs-grid__label">Ngày đặt hàng:</span>
                        <span class="specs-grid__value">March 15, 2024</span>
                    </div>
                </div>
                <div class="order-card__specs specs-grid">
                    <div class="specs-grid__info">
                        <div class="specs-grid__item">
                            <span class="specs-grid__label">Người nhận:</span>
                            <span class="specs-grid__value">Trần Nguyên Ngọc</span>
                        </div>
                        <div class="specs-grid__item">
                            <span class="specs-grid__label">Số điện thoại:</span>
                            <span class="specs-grid__value">0866926448</span>
                        </div>
                        <div class="specs-grid__item">
                            <span class="specs-grid__label">Tổng đơn hàng:</span>
                            <span class="specs-grid__value">150.000.000 VND</span>
                        </div>
                    </div>
                    <div class="specs-grid__delivery">
                        <div class="specs-grid__item w-100">
                            <span class="specs-grid__label">Địa chỉ giao hàng:</span>
                            <span class="specs-grid__value">57 Đàm Thanh 2, Phường Hòa Hiệp Nam, Quận Liên Chiểu, TP Đà
                                Nẵng</span>
                        </div>
                    </div>
                    <div class="specs-grid__status">
                        <div class="specs-grid__item">
                            <span class="specs-grid__label">Ghi chú:</span>
                            <span class="specs-grid__value">Demo</span>
                        </div>
                    </div>
                </div>
                <div class="order-card__button ">
                    <button class="btn btn-outline-danger mt-3" data-bs-toggle="modal" data-bs-target="#orderModal">Xem chi
                        tiết</button>
                </div>
            </div>
        </div>

        <div class="modal fade order-modal" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel"
            aria-hidden="true">
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
                                    <p class="shipping-details__body--info"> #1</p>
                                </div>
                                <div class="shipping-details__title--text shipping-details__body">
                                    <div class="shipping-details__body--title">Ngày đặt hàng:</div>
                                    <p class="shipping-details__body--info"> March 15, 2024</p>
                                </div>
                            </div>
                            <div class="shipping-details__name">
                                <div class="shipping-details__name--text shipping-details__body ">
                                    <div class="shipping-details__body--title">Người nhận:</div>
                                    <p class="shipping-details__body--info">Trần Nguyên Ngọc</p>
                                </div>
                                <div class="shipping-details__name--text shipping-details__body">
                                    <div class="shipping-details__body--title">Số điện thoại:</div>
                                    <p class="shipping-details__body--info">0866926448</p>
                                </div>
                            </div>
                            <div class="shipping-details__body">
                                <div class="shipping-details__body--title">Địa chỉ giao hàng:</div>
                                <p class="shipping-details__body--info">57 Đàm Thanh 2, Phường Hòa Hiệp Nam, Quận Liên
                                    Chiểu,
                                    TP Đà Nẵng</p>
                            </div>
                            <div class="shipping-details__body">
                                <div class="shipping-details__body--title">Ghi chú:</div>
                                <p class="shipping-details__body--info">Demo</p>
                            </div>
                            <div class="line-history"></div>
                            <div class="shipping-details__body">
                                <div class="shipping-details__body--title">Tổng đơn hàng:</div>
                                <p class="shipping-details__body--info">150.000.000 VND</p>
                            </div>
                            <div class="shipping-details__body">
                                <div class="shipping-details__body--title">Vận chuyển:</div>
                                <p class="shipping-details__body--info">0 VND</p>
                            </div>
                            <div class="shipping-details__body">
                                <div class="shipping-details__body--title">Giảm giá:</div>
                                <p class="shipping-details__body--info">0 VND</p>
                            </div>
                            <div class="shipping-details__body">
                                <div class="shipping-details__body--title">Tổng số tiền thanh toán:</div>
                                <p class="shipping-details__body--info">150.000.000 VND</p>
                            </div>
                            <div class="shipping-details__body">
                                <div class="shipping-details__body--title">Phương thức thanh toán:</div>
                                <p class="shipping-details__body--info">Thanh toán bằng tiền mặt</p>
                            </div>
                        </div>
                        <div class="line-history"></div>
                        <div class="product-details">
                            <span class="product-details__image">
                                <img src="{{ asset('images/Product/asus-rog-strix-g16-1.jpg') }}" alt=""
                                    class="product-details__image--img">
                            </span>
                            <div class="product-details__item">
                                <span class="product-details__item--info">
                                    <div class="product-details__item--info-title">
                                        ASUS ROG Strix G16 (2024)
                                    </div>
                                    <p class="product-details__item--info-description">
                                        CPU: AMD Ryzen 7 5800X 3.80GHz
                                    </p>
                                </span>
                                <span class="product-details__item--price">
                                    <div class="product-details__item--price-title">
                                        Giá tiền:
                                    </div>
                                    <p class="product-details__item--price-description">
                                        150.000.000 VND x 1
                                    </p>
                                </span>
                                <span class="product-details__item--price">
                                    <div class="product-details__item--price-title">
                                        Tổng cộng:
                                    </div>
                                    <p class="product-details__item--price-description">
                                        150.000.000 VND
                                    </p>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer order-modal__footer">
                        <button type="button" class="btn btn-outline-primary order-modal__close-btn"
                            data-bs-dismiss="modal">Quay lại</button>
                        <button type="button" class="btn btn-outline-danger order-modal__download-btn">Tạo lại đơn
                            hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
