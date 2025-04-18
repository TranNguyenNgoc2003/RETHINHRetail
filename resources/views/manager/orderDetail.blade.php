@extends('manager.layouts.management')

@section('content-manage')
    <div class="order-detail">
        <div class="order-detail__header">
            <h1>Thông tin đơn hàng</h1>
        </div>
        <div class="card shadow order-detail__content">
            @foreach ($lables_details as $lables_detail)
                <div class="order-detail__form">
                    <div class="order-detail__group row">
                        <div class="order-detail__info col-6">
                            <div class="order-detail__title">Mã đơn hàng:</div>
                            <span class="order-detail__value">#{{ $lables_detail['id'] }}</span>
                        </div>
                        <div class="order-detail__info col-6">
                            <div class="order-detail__title">Ngày đặt hàng:</div>
                            <span class="order-detail__value">{{ $lables_detail['created_date'] }}</span>
                        </div>
                    </div>
                    <div class="order-detail__group row">
                        <div class="order-detail__info col-6">
                            <div class="order-detail__title">Người nhận:</div>
                            <span class="order-detail__value">{{ $lables_detail['full_name'] }}</span>
                        </div>
                        <div class="order-detail__info col-6">
                            <div class="order-detail__title">Số điện thoại:</div>
                            <span class="order-detail__value">{{ $lables_detail['phone'] }}</span>
                        </div>
                    </div>
                    <div class="order-detail__info">
                        <div class="order-detail__title">Địa chỉ giao hàng:</div>
                        <span class="order-detail__value">{{ $lables_detail['address'] }}</span>
                    </div>
                    <div class="order-detail__info">
                        <div class="order-detail__title">Ghi chú:</div>
                        <span class="order-detail__value">{{ $lables_detail['status'] }}</span>
                    </div>
                    <div class="order-detail__info">
                        <div class="order-detail__title">Trạng thái đơn hàng:</div>
                        <span class="order-detail__value">{{ $lables_detail['shipping_status'] }}</span>
                    </div>
                    <div class="order-divider"></div>
                    <div class="order-detail__info">
                        <div class="order-detail__title">Tổng đơn hàng:</div>
                        <span class="order-detail__value">{{ number_format($lables_detail['total_price'], 0, ',', '.') }}
                            VND</span>
                    </div>
                    <div class="order-detail__info">
                        <div class="order-detail__title">Vận chuyển:</div>
                        <span class="order-detail__value">{{ $lables_detail['shipping_fee'] }} VND</span>
                    </div>
                    <div class="order-detail__info">
                        <div class="order-detail__title">Giảm giá:</div>
                        <span class="order-detail__value">{{ $lables_detail['discount'] }} VND</span>
                    </div>
                    <div class="order-detail__info">
                        <div class="order-detail__title">Tổng số tiền thanh toán:</div>
                        <span class="order-detail__value">
                            {{ number_format($lables_detail['total_price'] - $lables_detail['discount'] + $lables_detail['shipping_fee'], 0, ',', '.') }}
                            VND
                        </span>
                    </div>
                    <div class="order-detail__info">
                        <div class="order-detail__title">Phương thức thanh toán:</div>
                        <span class="order-detail__value">{{ $lables_detail['payment_method'] }}</span>
                    </div>
                    <div class="order-detail__info">
                        <div class="order-detail__title">Trạng thái thanh toán:</div>
                        <span class="order-detail__value">{{ $lables_detail['payment_status'] }}</span>
                    </div>
                    <div class="order-divider"></div>
                    @foreach ($details as $detail)
                        @if ($detail['id'] == $lables_detail['id'])
                            <div class="product-details">
                                <span class="product-details__image">
                                    <img src="{{ asset('images/Product/' . $detail['path_img']) }}" alt=""
                                        class="product-details__image--img">
                                </span>
                                <div class="product-details__item">
                                    <span class="product-details__item--info">
                                        <div class="product-details__item--info-id">
                                            Mã sản phẩm: #{{ $detail['product_id'] }}
                                        </div>
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
                    <div class="order-detail__button">
                        <a href="{{ route('manager.orders') }}" class="btn btn-outline-primary">Trở về</a>
                        <!-- Modal trigger button -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">
                            Chỉnh sửa
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">
                                    Trạng thái đơn hàng
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('manager.updateStatus', ['id' => $lables_detail['id']]) }}"
                                method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="order-detail__group">
                                        <label for="payment_status" class="order-detail__label">Trạng thái thanh toán</label>
                                        <select class="order-detail__input form-control" id="payment_status" name="payment_status">
                                            @foreach (['Chờ xử lý', 'Đã thanh toán', 'Thất bại', 'Đã hoàn tiền'] as $payment_status)
                                                <option value="{{ $payment_status }}"
                                                    {{ ($lables_detail['payment_status'] ?? '') === $payment_status ? 'selected' : '' }}>
                                                    {{ $payment_status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="order-detail__group">
                                        <label for="shipping_status" class="order-detail__label">Trạng thái đơn hàng</label>
                                        <select class="order-detail__input form-control" id="shipping_status" name="shipping_status">
                                            @foreach (['Đang giao', 'Đã hoàn thành', 'Đơn hàng đã hủy'] as $shipping_status)
                                                <option value="{{ $shipping_status }}"
                                                    {{ ($lables_detail['shipping_status'] ?? '') === $shipping_status ? 'selected' : '' }}>
                                                    {{ $shipping_status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Quay lại
                                    </button>
                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Optional: Place to the bottom of scripts -->
                <script>
                    const myModal = new bootstrap.Modal(
                        document.getElementById("modalId"),
                        options,
                    );
                </script>
            @endforeach
        </div>
    </div>
@endsection
