<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Insurance Owners</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('owners.index') }}">Car Insurance</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('owners.index') }}">Owners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cars.index') }}">Cars</a>
                </li>
                @if(Auth::user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('shortcodes.index')}}">ShortCodes</a>
                </li>
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                    <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} ({{ Auth::user()->role }})
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <p class="mb-0">{{ $message }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <p class="mb-0">{{$message}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

    @yield('content')

<footer class="mt-5 py-3 bg-light">
    <div class="container text-center">
        <p>&copy; [[CURRENT_YEAR]] [[COMPANY_NAME]].</p>
        <p>Contact us : [[CONTACT_EMAIL]]</p>
    </div>
</footer>
</div>
</body>
</html>
