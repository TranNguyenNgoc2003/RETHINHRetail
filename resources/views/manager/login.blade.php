<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/login_manage.css') }}">
    <title>RETHINK Retail</title>
</head>

<body>
    <div class="d-md-flex half">
        <div class="bg" style="background-image: url({{ asset('images/bg_login_manage.png') }});"></div>
        <div class="contents">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                            <div class="w-75 mb-4" style="margin: 0 auto;">
                                <h3 class="d-flex justify-content-start">Đăng nhập vào </h3>
                                <h3 class="d-flex justify-content-end" style="font-weight: bold">RETHINK Retail</h3>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-danger text-center">
                                    {{ $message }}
                                </div>
                            @endif
                            <form action="{{ route('manager.loginAuth') }}" method="POST">
                                @csrf
                                <div class="form-group first mb-4">
                                    <label for="Email">Email</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email" id="Email">
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Mật khẩu" id="password">
                                </div>
                                <div class="d-sm-flex mb-5 align-items-center">
                                    <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                    <label for="remember-me" class="label-agree-term" style="margin-left: 6px">
                                        Ghi nhớ đăng nhập
                                    </label>
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
                                <div class="submit_btn d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary w-75 h-25">
                                        Đăng nhập
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
