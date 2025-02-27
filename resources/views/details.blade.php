@extends('layouts.app')

@section('content_app')
    <div class="detailProduct container">
        <div class="row">
            <!-- Product Images -->
            <div class="detailProduct__image col-md-7">
                <div class="detailProduct__image--main">
                    <img id="mainImage" src="{{ asset('images/Product/' . $product->images->first()->path_img) }}"
                        alt="{{ $product->name_product }}">
                </div>
                <div class="detailProduct__image--thumb">
                    @foreach ($product->images->take(7) as $image)
                        <img src="{{ asset('images/Product/' . $image->path_img) }}" alt="{{ $product->name_product }}"
                            onclick="changeImage(event, this.src)">
                    @endforeach
                </div>
            </div>

            <!-- Product Details -->
            <div class="detailProduct__info col-md-5">
                <h2 class="detailProduct__info--title">{{ $product->name_product }}</h2>
                <div class="detailProduct__info--rating rating">
                    <div class="rating__star">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $product->rating ? 'text-warning' : 'text-secondary' }}"></i>
                        @endfor
                    </div>
                    <small class="rating__count">({{ $product->rating }}/5)</small>
                </div>
                <div class="detailProduct__info--options options">
                    @foreach ($relatedProducts as $item)
                        <a class="options__item{{ $product->id == $item->id ? 'Active' : '' }}"
                            href="{{ route('product.detail', ['id' => $item->id]) }}">
                            @if ($product->id == $item->id)
                                <i class="cil-check-alt"></i>
                            @endif
                            @if ($item->options_CPU)
                                <div class="options__item--cpu">{{ $item->options_CPU }}</div>
                            @endif
                            @if ($item->options_RAM && $item->options_HARD)
                                <div class="options__item--memory">{{ $item->options_RAM . ' - ' . $item->options_HARD }}
                                </div>
                            @elseif ($item->options_RAM && !$item->options_HARD)
                                <div class="options__item--memory">{{ $item->options_RAM }}</div>
                            @elseif (!$item->options_RAM && $item->options_HARD)
                                <div class="options__item--memory">{{ $item->options_HARD }}</div>
                            @endif
                            @if ($item->options_GPU)
                                <div class="options__item--gpu">{{ $item->options_GPU }}</div>
                            @endif
                            <div class="options__item--price">
                                {{ number_format(round($item->price - ($item->price / 100) * $product->discount, -5), 0, ',', '.') }}
                                VND</div>

                        </a>
                    @endforeach
                </div>
                <div class=" priceDetailsInfo">
                    <span class="priceDetailsInfo__priceCurrent{{ $product->id == $item->id ? 'Active' : '' }}">
                        {{ number_format(round($product->price - ($product->price / 100) * $product->discount, -5), 0, ',', '.') }}
                        VND
                    </span>
                    @if ($product->price && $product->discount)
                        <span class="priceDetailsInfo__priceUnline">{{ number_format($product->price, 0, ',', '.') }}
                            VND</span>
                    @endif
                </div>
                <div class="mb-4">
                    <h5>Color:</h5>
                    <div class="btn-group" role="group" aria-label="Color selection">
                        <input type="radio" class="btn-check" name="color" id="black" autocomplete="off" checked>
                        <label class="btn btn-outline-dark" for="black">Black</label>
                        <input type="radio" class="btn-check" name="color" id="silver" autocomplete="off">
                        <label class="btn btn-outline-secondary" for="silver">Silver</label>
                        <input type="radio" class="btn-check" name="color" id="blue" autocomplete="off">
                        <label class="btn btn-outline-primary" for="blue">Blue</label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" value="1" min="1"
                        style="width: 80px;">
                </div>
                <button class="btn btn-primary btn-lg mb-3 me-2">
                    <i class="bi bi-cart-plus"></i> Add to Cart
                </button>
                <button class="btn btn-outline-secondary btn-lg mb-3">
                    <i class="bi bi-heart"></i> Add to Wishlist
                </button>
                <div class="mt-4">
                    <h5>Key Features:</h5>
                    <ul>
                        <li>Industry-leading noise cancellation</li>
                        <li>30-hour battery life</li>
                        <li>Touch sensor controls</li>
                        <li>Speak-to-chat technology</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeImage(event, src) {
            document.getElementById('mainImage').src = src;
            document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
            event.target.classList.add('active');
        }
    </script>
@endsection
