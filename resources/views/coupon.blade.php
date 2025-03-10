@extends('layouts.app')

@section('content_app')
    <div class="voucher-body">
        <div class="container coupons">
            <div class="coupons__title">
                <h3>Mã khuyến mãi</h3>
            </div>
            <div class="coupons__list">
                @foreach ($coupons->chunk(2) as $chunk)
                    <div class="coupons__row">
                        @foreach ($chunk as $coup)
                            <div class="ticket">
                                <div class="ticket__count">
                                    <span>{{ $coup->count }}</span>
                                </div>
                                <div class="ticket__info">
                                    <small class="ticket__info--shop">RETHINK Retail</small>
                                    <h3 class="ticket__info--title">{{ $coup->title }}</h3>
                                    <div class="ticket__info--description ticket-description">
                                        <span class="ticket-description__price">Khuyến mãi giảm:
                                            {{ $coup->promotion }}%</span>
                                        <span class="ticket-description__text">{{ $coup->describe }}</span>
                                        <span class="ticket-description__date">
                                            Áp dụng từ: {{ $coup->formatted_start_date }} - {{ $coup->formatted_end_date }}
                                        </span>
                                    </div>
                                    <div class="ticket__info--code">
                                        Mã ưu đãi: {{ $coup->code }}
                                    </div>
                                    <a class="ticket__info--link" href="#">Xem chi tiết</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
