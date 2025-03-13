@extends('layouts.app')

@section('content_app')
    <div class="order">
        <div class="order__container">
            <i class="order__icon fas fa-check-circle"></i>
            <h2 class="order__title">Xin chúc mừng! Đơn hàng của bạn đã được đặt</h2>
            <p class="order__description">Chúng tôi sẽ giao hàng tới bạn trong thời gian sớm nhất.</p>
            <a href="{{ route('history') }}" class="order__button btn btn-primary">Xem chi tiết đơn hàng</a>
        </div>
    </div>
@endsection
