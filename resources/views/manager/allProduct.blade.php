@extends('manager.layouts.management')

@section('content-manage')
    <div class="list-products">
        <div class="list-products__header">
            <h1 class="list-products__title">Danh sách sản phẩm</h1>
            <div class="list-products__search">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" style="background-color: black; border-color: black"
                                type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="list-products__table card shadow">
            @if (!$products->isEmpty())
                <ul class="table-products table-products__header">
                    <li class="table-products__id ">
                        Mã sản phẩm
                    </li>
                    <li class="table-products__image">
                        Hình ảnh
                    </li>
                    <li class="table-products__name">
                        Tên sản phẩm
                    </li>
                    <li class="table-products__option">
                        Cấu hình
                    </li>
                </ul>
                @foreach ($products->take($pagination) as $product)
                    <a href="{{ route('manager.editProduct', ['id' => $product->id]) }}" class="list-products__link">
                        <ul class="table-products">
                            <li class="table-products__id height-products">
                                {{ $product->id }}
                            </li>
                            <li class="table-products__image height-products">
                                <img alt="{{ $product->name_product }}"
                                    src="{{ asset('images/Product/' . $product->images->first()->path_img) }}">
                            </li>
                            <li class="table-products__name height-products">
                                {{ $product->name_product }}
                            </li>
                            <li class="table-products__option" style="margin-top: 50px">
                                {{ number_format(round($product->price - ($product->price / 100) * $product->discount, -4), 0, ',', '.') }}
                                VND
                                <br>
                                {{ $product->option_cpu }} {{ $product->option_gpu }}
                                {{ $product->option_ram }} {{ $product->option_hard }}
                            </li>
                        </ul>
                    </a>
                    <div class="list-products__divider"></div>
                @endforeach
                <nav aria-label="Page navigation" class="d-flex justify-content-end" style="margin-top: 30px">
                    <ul class="pagination">
                        @if ($products->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($products->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">&raquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @else
                <div class="text-center">
                    <p>Danh sách đơn hàng hiện tại đang trống</p>
                </div>
            @endif
        </div>
    </div>
@endsection
