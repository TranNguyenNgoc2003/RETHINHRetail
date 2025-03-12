@extends('layouts.app')

@section('content_app')
    <div class="shipping-form">
        <h3 class="shipping-form__title">Thêm địa chỉ giao hàng mới</h3>
        <form action="{{ route('shipping.addDelivery', ['orderId' => $orderId]) }}" method="POST" class="shipping-form__form">
            @csrf
            <div class="shipping-form__group">
                <label for="fullname" class="shipping-form__label">Họ và tên</label>
                <input type="text" class="shipping-form__input form-control" id="fullname" name="fullname" required>
            </div>

            <div class="shipping-form__group">
                <label for="address" class="shipping-form__label">Địa chỉ</label>
                <input type="text" class="shipping-form__input form-control" id="address" name="address" required>
            </div>

            <div class="shipping-form__group">
                <label for="phone" class="shipping-form__label">Số điện thoại</label>
                <input type="text" class="shipping-form__input form-control" id="phone" name="phone" required>
            </div>

            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

            <button type="submit" class="shipping-form__button btn btn-primary">
                Thêm địa chỉ
            </button>
        </form>
    </div>
@endsection
