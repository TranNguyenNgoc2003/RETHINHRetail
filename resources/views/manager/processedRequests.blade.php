@extends('manager.layouts.management')

@section('content-manage')
    <div class="services">
        <div class="services__header">
            <h1 class="services__title">Danh sách yêu cầu đã xử lý</h1>
            <div class="services__search">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light bservice-0 small" placeholder="Tìm kiếm..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" style="background-color: black; bservice-color: black"
                                type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="services__table card shadow">
            @if (!$services->isEmpty())
                <ul class="table-services table-services__header">
                    <li class="table-services__id">
                        Mã yêu cầu
                    </li>
                    <li class="table-services__name">
                        Tên dịch vụ
                    </li>
                    <li class="table-services__user">
                        Tên người dùng
                    </li>
                    <li class="table-services__spworker">
                        Nhân viên hỗ trợ
                    </li>
                    <li class="table-services__time">
                        Thời gian yêu cầu
                    </li>
                </ul>
                @foreach ($services->take($pagination) as $service)
                    <div class="services__link">
                        <ul class="table-services table-services__content" data-bs-toggle="modal"
                            data-bs-target="#modalId{{ $service->id }}">
                            <li class="table-services__id height-services">
                                {{ $service->id }}
                            </li>
                            <li class="table-services__name height-services">
                                {{ $service->service_name }}
                            </li>
                            <li class="table-services__user height-services">
                                {{ $service->username }}
                            </li>
                            <li class="table-services__spworker height-services">
                                {{ $service->supportWorker->name }}
                            </li>
                            <li class="table-services__time height-services">
                                {{ $service->start_time }}
                            </li>
                        </ul>
                        <div class="services__divider"></div>

                        <div class="modal fade" id="modalId{{ $service->id }}" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId{{ $service->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Chi tiết yêu cầu
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="services-group">
                                                <div class="services-group__title">Tên dịch vụ:</div>
                                                <div class="services-group__content">{{ $service->service_name }}</div>
                                            </div>
                                            <div class="services-group">
                                                <div class="services-group__title">Tên người dùng:</div>
                                                <div class="services-group__content">{{ $service->username }}</div>
                                            </div>
                                            <div class="services-group">
                                                <div class="services-group__title">Số điện thoại:</div>
                                                <div class="services-group__content">{{ $service->phone }}</div>
                                            </div>
                                            <div class="services-group">
                                                <div class="services-group__title">Email:</div>
                                                <div class="services-group__content">{{ $service->email }}</div>
                                            </div>
                                            <div class="services-group">
                                                <div class="services-group__title">Mô tả yêu cầu:</div>
                                                <div class="services-group__content">{{ $service->note }}</div>
                                            </div>
                                            <div class="services-group">
                                                <div class="services-group__title">Thời gian yêu cầu:</div>
                                                <div class="services-group__content">{{ $service->start_time }}</div>
                                            </div>
                                            <div class="services-group">
                                                <div class="services-group__title">Thời gian hoàn thành:</div>
                                                <div class="services-group__content">{{ $service->end_time }}</div>
                                            </div>
                                        </div>
                                        <div class="services-divider"></div>
                                        <div class="container-fluid">
                                            <div class="services-group">
                                                <div class="services-group__title">Nhân viên hỗ trợ:</div>
                                                <div class="services-group__content">
                                                    {{ $service->supportWorker->name }}
                                                </div>
                                            </div>
                                            <div class="services-group">
                                                <div class="services-group__title">Số điện thoại:</div>
                                                <div class="services-group__content">
                                                    {{ $service->supportWorker->phone }}
                                                </div>
                                            </div>
                                            <div class="services-group">
                                                <div class="services-group__title">Chức vụ:</div>
                                                <div class="services-group__content">
                                                    {{ $service->supportWorker->roll->roll_name }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Quay lại
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <nav aria-label="Page navigation" class="d-flex justify-content-end" style="margin-top: 20px">
                    <ul class="pagination">
                        @if ($services->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $services->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $services->lastPage(); $i++)
                            <li class="page-item {{ $i == $services->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $services->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($services->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $services->nextPageUrl() }}" aria-label="Next">
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
