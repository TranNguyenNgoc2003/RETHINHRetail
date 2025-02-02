@extends('layouts.loginAndRegister')

@section('content')
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{ asset('images/login_and_register.png') }}" alt="Hình ảnh đăng ký"></figure>
                    <a href="{{ route('register') }}" class="signup-image-link">Tạo tài khoản</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Đăng nhập</h2>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-danger text-center">
                            {{ $message }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('loginAuth') }}" class="register-form" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Email" value="{{ old('email') }}">

                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <div class="col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Ghi nhớ đăng
                                nhập</label>
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
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập" />
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Hoặc đăng nhập bằng</span>
                        <ul class="socials">
                            <li>
                                <a href="{{ route('social.login', 'facebook') }}">
                                    <i class="display-flex-center zmdi zmdi-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="display-flex-center zmdi zmdi-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('social.login', 'google') }}">
                                    <i class="display-flex-center zmdi zmdi-google"></i>
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
@endsection