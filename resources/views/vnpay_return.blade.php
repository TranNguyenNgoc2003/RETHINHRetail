@extends('layouts.app')

@section('content_app')
    <div class="payment-result">
        <h2 class="payment-result__title">Kết quả thanh toán VNPAY</h2>

        @if ($status === 'success')
            <p class="payment-result__message payment-result__message--success">Thanh toán thành công!</p>
        @else
            <p class="payment-result__message payment-result__message--error">Thanh toán thất bại. Vui lòng thử lại.</p>
        @endif

        <a href="{{ route('history') }}" class="payment-result__link">Xem lịch sử đơn hàng</a>
    </div>
@endsection
