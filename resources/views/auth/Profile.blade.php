@extends('layouts.app')

@section('content_app')
    <div class="profile container">
        <div class="profile__title">
            <h3>Thông tin cá nhân</h3>
        </div>
        <div class="profile__info profile-edit">
            <div class="profile-edit__sidebar edit-sidebar">
                <div class="edit-sidebar__item">
                    <a href="#" class="edit-sidebar__item--link">
                        <i class="edit-sidebar__item--icon fas fa-pencil-alt"></i>
                        <span class="edit-sidebar__item--text">Cập nhật tài khoản</span>
                    </a>
                </div>
                <div class="edit-sidebar__item">
                    <a href="#" class="edit-sidebar__item--link" data-bs-toggle="modal" data-bs-target="#modalId">
                        <i class="edit-sidebar__item--icon fas fa-backspace"></i>
                        <span class="edit-sidebar__item--text">Xóa tài khoản</span>
                    </a>
                    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="edit-sidebar__item--modal modal-dialog modal-dialog-scrollable modal-dialog-centered"
                            role="document">
                            <div class="modal-content">
                                <form action="{{ route('profile.delete',['id' => Auth::user()->id]) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Xác nhận xóa tài khoản
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn có chắc chắn muốn xóa tài khoản? Các dữ liệu của bạn sẽ bị mất.</p>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                                            Hủy
                                        </button>
                                        <button type="submit" class="btn btn-outline-danger">Xóa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="edit-sidebar__item">
                    <a href="{{ route('home') }}" class="edit-sidebar__item--link">
                        <i class="edit-sidebar__item--icon fas fa-undo-alt"></i>
                        <span class="edit-sidebar__item--text">Trở về</span>
                    </a>
                </div>
            </div>
            <div class="profile-edit__content">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                    class="profile-edit__form">
                    @csrf
                    <div class="profile-edit__group">
                        <label class="profile-edit__avatar" for="avatar">
                            <div class="profile-edit__group">
                                <label class="profile-edit__avatar" for="avatar">
                                    <img id="avatar-preview" src="{{ asset('images/avatar/default-avatar.png') }}"
                                        class="profile-edit__avatar--img" alt="Ảnh đại diện">
                                    <span class="profile-edit__avatar--edit">Chỉnh sửa</span>
                                </label>
                            </div>
                            {{-- <input class="d-none" type="file" name="avatar" id="avatar" accept="image/*"> --}}
                        </label>
                    </div>
                    <div class="profile-edit__group">
                        <label for="fullname" class="profile-edit__label">Họ và tên</label>
                        <input type="text" class="profile-edit__input form-control" id="fullname" name="fullname"
                            value="{{ Auth::user()->fullname }}" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="profile-edit__group">
                        <label for="phone" class="profile-edit__label">Số điện thoại</label>
                        <input type="text" class="profile-edit__input form-control" id="phone" name="phone"
                            value="{{ Auth::user()->phone }}" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="profile-edit__row">
                        <div class="profile-edit__group">
                            <label for="birthday" class="profile-edit__label">Ngày sinh</label>
                            <input type="date" class="profile-edit__input form-control" id="birthday" name="birthday"
                                value="{{ Auth::user()->birthday }}" required>
                        </div>
                        <div class="profile-edit__group">
                            <label for="gender" class="profile-edit__label">Giới tính</label>
                            <input type="text" class="profile-edit__input form-control" id="gender" name="gender"
                                value="{{ Auth::user()->gender }}" placeholder="Nhập giới tính">
                        </div>
                    </div>
                    <div class="profile-edit__group">
                        <label for="password" class="profile-edit__label">Mật khẩu</label>
                        <input type="password" class="profile-edit__input form-control" id="password" name="password"
                            placeholder="Nhập mật khẩu">
                    </div>
                    <div class="profile-edit__group">
                        <label for="password_confirmation" class="profile-edit__label">Nhập lại mật khẩu</label>
                        <input type="password" class="profile-edit__input form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="Nhập lại mật khẩu">
                    </div>

                    <button type="submit" class="profile-edit__button btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
