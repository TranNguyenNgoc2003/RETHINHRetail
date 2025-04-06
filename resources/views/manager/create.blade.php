@extends('manager.layouts.management')

@section('content-manage')
    <div class="users-edit">
        <div class="users-edit__header">
            <h1 class="users-edit__title">Thông tin người dùng</h1>
        </div>
        <div class="card shadow users-edit__content">
            <form action="{{ route('manager.createUser') }}" method="POST" class="users-edit__form">
                @csrf
                <div class="users-edit__group">
                    <label class="users-edit__avatar" for="avatar">
                        <div class="users-edit__group">
                            <label class="users-edit__avatar" for="avatar">
                                <img id="avatar-preview" src="{{ asset('images/avatar/default-avatar.png') }}"
                                    class="users-edit__avatar--img" alt="Ảnh đại diện">
                                <span class="users-edit__avatar--edit">Chỉnh sửa</span>
                            </label>
                        </div>
                        {{-- <input class="d-none" type="file" name="avatar" id="avatar" accept="image/*"> --}}
                    </label>
                </div>
                <div class="users-edit__group">
                    <label for="fullname" class="users-edit__label">Họ và tên</label>
                    <input type="text" class="users-edit__input form-control" id="fullname" name="fullname"
                        placeholder="Nhập họ và tên" required>
                </div>
                <div class="users-edit__group">
                    <label for="email" class="users-edit__label">Email</label>
                    <input type="email" class="users-edit__input form-control" id="email" name="email"
                        placeholder="Nhập email" required>
                </div>
                <div class="users-edit__group">
                    <label for="phone" class="users-edit__label">Số điện thoại</label>
                    <input type="text" class="users-edit__input form-control" id="phone" name="phone"
                        placeholder="Nhập số điện thoại">
                </div>
                <div class="users-edit__row">
                    <div class="users-edit__group">
                        <label for="birthday" class="users-edit__label">Ngày sinh</label>
                        <input type="date" class="users-edit__input form-control" id="birthday" name="birthday">
                    </div>
                    <div class="users-edit__group">
                        <label for="gender" class="users-edit__label">Giới tính</label>
                        <input type="text" class="users-edit__input form-control" id="gender" name="gender"
                            placeholder="Nhập giới tính">
                    </div>
                </div>
                <div class="users-edit__group">
                    <label for="password" class="users-edit__label">Mật khẩu</label>
                    <input type="password" class="users-edit__input form-control" id="password" name="password"
                        placeholder="Nhập mật khẩu" required>
                </div>
                <div class="users-edit__group">
                    <label for="password_confirmation" class="users-edit__label">Nhập lại mật khẩu</label>
                    <input type="password" class="users-edit__input form-control" id="password_confirmation"
                        name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                </div>

                <button type="submit" class="users-edit__button btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection
