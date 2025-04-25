@extends('layouts.LoginAndRegister')

@section('content')
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Đăng ký</h2>
                <form method="POST" action="{{ route('registerAuth') }}" class="register-form" id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="fullname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" placeholder="Tên của bạn" value="{{ old('fullname') }}">
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý với tất cả các  <a href="#" class="term-service" style="color: red">Điều khoản dịch vụ</a></label>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="list-style: none; margin-left: -40px; color: red">
                                @foreach (array_unique($errors->all()) as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng ký"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{ asset('images/login_and_register.png') }}" alt="sing up image"></figure>
                <a href="{{ route('login') }}" class="signup-image-link">Tôi đã có tài khoản</a>
            </div>
        </div>
    </div>
</section>
@endsection