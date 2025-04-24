<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>RETHINK Retail</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/icons/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('css/style-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/management.css') }}" rel="stylesheet">
    {{-- @vite(['resources/js/app.js']) --}}
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-black sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('manager') }}">
                <img style="width: 120px;" src="{{ asset('images/Rethink-Logo-white.png') }}">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('manager') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bảng điều khiển</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tài khoản & Đơn hàng
            </div>

            <!-- Nav Item - Components Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseComponents" aria-expanded="false" aria-controls="collapseComponents">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản lý tài khoản</span>
                    <i class="fas fa-angle-down float-right" style="font-size: 18px; margin-top: 5px"></i>
                </a>
                <div id="collapseComponents" class="collapse" aria-labelledby="headingComponents"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Chức năng chính:</h6>
                        <a class="collapse-item" href="{{ route('manager.users') }}">Quản lý người dùng</a>
                        <a class="collapse-item" href="{{ route('manager.create') }}">Thêm tài khoản mới</a>
                        <a class="collapse-item" href="{{ route('manager.admins') }}">Quản lý quản trị viên</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Lịch sử đơn hàng</span>
                    <i class="fas fa-angle-down float-right" style="font-size: 18px; margin-top: 5px"></i>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Thông tin đơn hàng:</h6>
                        <a class="collapse-item" href="{{ route('manager.processingOrders') }}">Đơn hàng đang xử lý</a>
                        <a class="collapse-item" href="{{ route('manager.deliveredOrders') }}">Đơn hàng đã giao</a>
                        <a class="collapse-item" href="{{ route('manager.cancelledOrders') }}">Đơn hàng đã hủy</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                SẢN PHẨM & KHO HÀNG
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <i class="fas fa-box-open"></i>
                    <span>Quản lý sản phẩm</span>
                    <i class="fas fa-angle-down float-right" style="font-size: 18px; margin-top: 5px"></i>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Chức năng chính:</h6>
                        <a class="collapse-item" href="{{ route('manager.allProduct') }}">Danh sách sản phẩm</a>
                        <a class="collapse-item" href="{{ route('manager.newProduct') }}">Thêm sản phẩm mới</a>
                        <a class="collapse-item" href="#">Quản lý tồn kho</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                YÊU CẦU & TIN NHẤN
            </div>

            <!-- Nav Item - Pending Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapsePending" aria-expanded="false" aria-controls="collapsePending">
                    <i class="fas fa-tasks"></i>
                    <span>Xử lý yêu cầu</span>
                    <i class="fas fa-angle-down float-right" style="font-size: 18px; margin-top: 5px"></i>
                </a>
                <div id="collapsePending" class="collapse" aria-labelledby="headingPending"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Chức năng chính:</h6>
                        <a class="collapse-item" href="{{ route('manager.pendingRequests') }}">Yêu cầu đang xử
                            lý</a>
                        <a class="collapse-item" href="{{ route('manager.processedRequests') }}">Yêu cầu đã xử lý</a>
                    </div>
                </div>
            </li>
        </ul>


        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    {{-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" style="background-color: black; border-color: black"
                                    type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            @if (!Auth::guard('manager')->check())
                                <a class="mr-2 d-none d-lg-inline text-gray-600 small"
                                    href="{{ route('manager.login') }}">Đăng nhập</a>
                            @else
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('manager')->user()->fullname }}
                                    </span>
                                    <img class="img-profile rounded-circle"
                                        src="{{ asset('images/avatar/default-avatar.png') }}">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown" style=" margin-left: -50px ">
                                    <a class="dropdown-item" href="{{ route('manager.infoEdit', ['id' => Auth::guard('manager')->user()->id]) }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Hồ sơ
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Cài đặt
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Nhật ký
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Đăng xuất
                                    </a>
                                </div>
                            @endif
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content-manage')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn đăng xuất?</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn muốn kết thúc phiên làm việc hiện tại.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Hủy</button>
                    <form id="logout-form" action="{{ route('manager.logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">Đăng xuất</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
