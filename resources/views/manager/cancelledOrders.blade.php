@extends('manager.layouts.management')

@section('content-manage')
    <div class="list-orders">
        <div class="list-orders__header">
            <h1 class="list-orders__title">Danh sách đơn hàng đã hủy</h1>
            <div class="list-orders__search">
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
        <div class="list-orders__table card shadow">
            @if (!$orders->isEmpty())
                <ul class="table-orders table-orders__header">
                    <li class="table-orders__id">
                        Mã đơn
                    </li>
                    <li class="table-orders__name">
                        Tên khách hàng
                    </li>
                    <li class="table-orders__price">
                        Giá trị đơn hàng
                    </li>
                    <li class="table-orders__date">
                        Thời gian đặt
                    </li>
                    <li class="table-orders__status">
                        Trạng thái
                    </li>
                </ul>
                @foreach ($orders->take($pagination) as $order)
                    <a href="{{ route('manager.orderDetail', ['id' => $order->id]) }}" class="list-orders__link">
                        <ul class="table-orders">
                            <li class="table-orders__id">
                                {{ $order->id }}
                            </li>
                            <li class="table-orders__name">
                                {{ $order->fullname }}
                            </li>
                            <li class="table-orders__price">
                                {{ number_format($order->total_price, 0, ',', '.') }} VNĐ
                            </li>
                            <li class="table-orders__date">
                                {{ $order->created_date }}
                            </li>
                            <li class="table-orders__status">
                                {{ $order->shipping_status }}
                            </li>
                        </ul>
                    </a>
                @endforeach
                <nav aria-label="Page navigation" class="d-flex justify-content-end">
                    <ul class="pagination">
                        @if ($orders->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $orders->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $orders->lastPage(); $i++)
                            <li class="page-item {{ $i == $orders->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($orders->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $orders->nextPageUrl() }}" aria-label="Next">
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
