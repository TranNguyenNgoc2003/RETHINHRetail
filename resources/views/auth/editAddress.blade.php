@extends('layouts.app')

@section('content_app')
    <div class="shipping-form">
        <h3 class="shipping-form__title">Chỉnh sửa địa chỉ giao hàng</h3>
        <form action="{{ route('address.update', ['id' => $address->id]) }}" method="POST" class="shipping-form__form">
            @csrf
            @method('PUT')

            <div class="shipping-form__group">
                <label for="fullname" class="shipping-form__label">Họ và tên</label>
                <input type="text" class="shipping-form__input form-control" id="fullname" name="fullname" 
                       value="{{ $address->fullname }}" required>
            </div>

            <div class="shipping-form__group">
                <label for="address" class="shipping-form__label">Địa chỉ</label>
                <input type="text" class="shipping-form__input form-control" id="address" name="address" 
                       value="{{ $address->address }}" required>
            </div>

            <div class="shipping-form__group">
                <label for="phone" class="shipping-form__label">Số điện thoại</label>
                <input type="text" class="shipping-form__input form-control" id="phone" name="phone" 
                       value="{{ $address->phone }}" required>
            </div>

            <button type="submit" class="shipping-form__button btn btn-primary">
                Cập nhật địa chỉ
            </button>
        </form>
    </div>
@endsection
