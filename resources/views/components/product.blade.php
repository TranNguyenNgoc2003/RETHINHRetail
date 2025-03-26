<div class="col-md-3 product__col">
    <div class="product__card">
        <a href="{{ route('product.detail', ['id' => $product->id]) }}">
            @if ($product->discount)
                <span class="product__card--badge">Giảm {{ $product->discount }}%</span>
            @endif
            <div class="product__card--image">
                <img alt="{{ $product->name_product }}"
                    src="{{ asset('images/Product/' . $product->images->first()->path_img) }}">
            </div>
            <div class="product__card--content">
                <div class="product__card--content-title">
                    {{ $product->name_product . ' ' . $product->option_cpu . ' ' . $product->option_gpu . ' ' . $product->option_ram . ' ' . $product->option_hard }}
                </div>
                <div class="product__card--content-rating rating">
                    <div class="rating__star">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $product->rating ? 'text-warning' : 'text-secondary' }}"></i>
                        @endfor
                    </div>
                    <small class="rating__count">({{ $product->rating }}/5)</small>
                </div>
                @if ($product->description)
                    <p class="product__card--content-description">{{ $product->description }}</p>
                @else
                    <p class="product__card--content-NoneDescription"></p>
                @endif
                <div class="product__card--content-priceInfo priceInfo">
                    <span class="priceInfo__priceCurrent">
                        {{ number_format(round($product->price - ($product->price / 100) * $product->discount, -4), 0, ',', '.') }}
                        VND
                    </span>
                    @if ($product->price && $product->discount)
                        <span class="priceInfo__priceUnline">{{ number_format($product->price, 0, ',', '.') }}
                            VND</span>
                    @endif
                </div>
            </div>
        </a>
    </div>
</div>
