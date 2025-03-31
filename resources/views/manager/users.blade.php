@extends('manager.layouts.management')

@section('content-manage')
    <div class="list-users">
        <div class="list-users__header">
            <h1 class="list-users__title">Danh sách người dùng</h1>
            <div class="list-users__search">
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
        <div class="list-users__table card shadow">
            @if (!$users->isEmpty())
                <ul class="table-users table-users__header">
                    <li class="table-users__id">
                        ID
                    </li>
                    <li class="table-users__name">
                        Họ tên
                    </li>
                    <li class="table-users__email">
                        Email
                    </li>
                    <li class="table-users__date">
                        Ngày tạo
                    </li>
                </ul>
                @foreach ($users->take($pagination) as $user)
                    <a href=" {{ route('manager.infoEdit', ['id' => $user->id]) }}" class="list-users__link">
                        <ul class="table-users">
                            <li class="table-users__id">
                                {{ $user->id }}
                            </li>
                            <li class="table-users__name">
                                {{ $user->fullname }}
                            </li>
                            <li class="table-users__email">
                                {{ $user->email }}
                            </li>
                            <li class="table-users__date">
                                {{ $user->created_at->format('d/m/Y') }}
                            </li>
                        </ul>
                    </a>
                @endforeach
                <nav aria-label="Page navigation" class="d-flex justify-content-end">
                    <ul class="pagination">
                        @if ($users->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $users->lastPage(); $i++)
                            <li class="page-item {{ $i == $users->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($users->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
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
                    <p>Danh sách người dùng hiện tại đang trống</p>
                </div>
            @endif
        </div>
    </div>
@endsection
