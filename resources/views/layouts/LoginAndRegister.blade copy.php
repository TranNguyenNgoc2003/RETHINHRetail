<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
</head>
<body>
        <nav class="navbar navbar-expand-sm navbar-light navbar_page">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarID">
                    <div class="navbar-nav">
                        <a style="font-family:Cursive;" class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">
                            Tech Store
                        </a>
                        
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto"> 
                    @guest
                        <li class="nav-item">
                            <a class=" {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class=" {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                        </li>
                    @else    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <a class="nav-link {{ (request()->is('showAccount')) ? 'active' : '' }}" href="{{ route('showAccount') }}">Account Manager</a>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                >Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        @yield('content')
           
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    

</body>
</html>