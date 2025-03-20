@extends('layouts.app')

@section('content_app')
    <h2 style="margin-top: 10%">Kết quả tìm kiếm cho: "{{ $query }}"</h2>

    @if ($results->isEmpty())
        <p>Không tìm thấy kết quả nào.</p>
    @else
        <ul>
            @foreach ($results as $product)
                <li>
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name_product }}</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
