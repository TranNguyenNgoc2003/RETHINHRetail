@extends('layouts.app')

@section('content_app')
    <div class="container category">
        <h3 class="category__title">{{ $title }}</h3>
        <div class="row category__product">
            @if ($products->isNotEmpty())
                @foreach ($products->sortByDesc('rating')->unique('name_product')->take(12) as $product)
                    @include('components.product', ['product' => $product])
                @endforeach
            @else
                <p class="category__product--empty">Hiện chưa có sản phẩm nào. Hãy quay lại sau!</p>
            @endif
        </div>
    </div>
@endsection
