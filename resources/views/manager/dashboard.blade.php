@extends('manager.layouts.management')

@section('content-manage')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bảng điều khiển</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Thu nhập (Hàng tháng)</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($monthly_income, 0, ',', '.') }} VNĐ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Thu nhập (Hàng năm)</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($yearly_income, 0, ',', '.') }} VNĐ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tiến độ xử lý yêu cầu
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">{{ $progress }}%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: {{ $progress }}%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Yêu cầu đang chờ xử lý</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $pending_service }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Đơn hàng gần đây</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Tùy chọn:</div>
                            <a class="dropdown-item" href="#">Hành động</a>
                            <a class="dropdown-item" href="#">Hành động khác</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Tùy chọn khác</a>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div class="list-order">
                            <span class="list-order__id font-weight-bold">Mã đơn</span>
                            <span class="list-order__name font-weight-bold">Tên khách hàng</span>
                            <span class="list-order__price font-weight-bold">Giá trị đơn hàng</span>
                            <span class="list-order__time font-weight-bold">Thời gian đặt</span>
                            <span class="list-order__status font-weight-bold">Trạng thái</span>
                        </div>
                        @foreach ($recent_orders as $recent_order)
                            <a href="" class="list-order">
                                <span class="list-order__id">{{ $recent_order->id }}</span>
                                <span class="list-order__name">{{ $recent_order->fullname }}</span>
                                <span class="list-order__price">{{ number_format($recent_order->total_price, 0, ',', '.') }}
                                    VNĐ</span>
                                <span class="list-order__time">{{ $recent_order->created_date }}</span>
                                <span class="list-order__status">{{ $recent_order->shipping_status }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Nguồn doanh thu</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Tùy chọn:</div>
                            <a class="dropdown-item" href="#">Hành động</a>
                            <a class="dropdown-item" href="#">Hành động khác</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Lựa chọn khác</a>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> VNPAY
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Credit/Debit Card
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> COD
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quy trình chăm sóc khách hàng</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Tiếp nhận yêu cầu <span class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Xác minh thông tin khách hàng <span class="float-right">40%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Phân loại và xử lý yêu cầu <span class="float-right">60%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Giải quyết và phản hồi khách hàng <span
                            class="float-right">80%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Hoàn tất hỗ trợ <span class="float-right">Hoàn thành!</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>



        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tổng quan hệ thống</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="{{ asset('images/undraw_posting_photo.png') }}" alt="...">
                    </div>
                    <p>Bảng điều khiển cung cấp thông tin quan trọng về hiệu suất, lượng truy cập, số lượng người dùng và
                        các chỉ số quan trọng khác. Giữ cho hệ thống của bạn luôn hoạt động ổn định bằng cách cập nhật thông
                        tin thường xuyên.</p>
                    <a target="_blank" rel="nofollow" href="#">Xem báo cáo chi tiết &rarr;</a>
                </div>
            </div>
        </div>
    </div>
@endsection
