@extends('layouts.app')

@section('content_app')
    <div class="search-results container">
        <h3 class="search-results__title">Kết quả tìm kiếm cho: "{{ $query }}"</h3>

        @if ($products->isEmpty())
            <p class="search-results__empty">Không tìm thấy sản phẩm nào phù hợp.</p>
        @else
            <div class="search-results__list row">
                @foreach ($products->sortByDesc('rating')->unique('name_product')->take(8) as $product)
                    @include('components.product', ['product' => $product])
                @endforeach
            </div>
        @endif
    </div>
@endsection
