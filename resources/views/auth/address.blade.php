@extends('layouts.app')

@section('content_app')
    <div class="container logistica">
        @if ($deliveries->isNotEmpty())
            <div class="logistica__title">
                <h3>Địa chỉ giao hàng</h3>
            </div>
            <div class="logistica__form">
                <div class="logistica__info">
                    @foreach ($deliveries as $delivery)
                        <div class="logistica__info--address address">
                            <label class="address__label">
                                <div class="address__label--content">
                                    <span class="address__label--content-name">{{ $delivery->fullname }}</span>
                                    <span class="address__label--content-addr">{{ $delivery->address }}</span>
                                    <span class="address__label--content-phone">{{ $delivery->phone }}</span>
                                </div>
                            </label>
                            <div class="address__icon">
                                <a href="{{ route('address.editAddress', ['id' => $delivery->id]) }}"
                                    class="address__icon--edit">
                                    <i class="cil-pencil"></i>
                                </a>
                                <a href="{{ route('address.delete', [ 'id' => $delivery->id]) }}"
                                    class="address__icon--delete">
                                    <i class="cil-trash"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="logistica__btn">
                <a class="logistica__btn--add btn btn-secondary"
                    href="{{ route('address.newAddress') }}">
                    Thêm địa chỉ giao hàng mới
                </a>
            </div>
        @else
            <div class="logistica__title">
                <h3>Danh sách địa chỉ hiện đang trống</h3>
            </div>
            <div class="logistica__btn">
                <a class="logistica__btn--add btn btn-secondary"
                    href="{{ route('address.newAddress') }}">Thêm địa chỉ giao hàng mới</a>
            </div>
        @endif
    </div>
@endsection
