<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    @include('home.include.head')

</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="/">
                <img class="logo" src="{{ URL::asset('/logo/logosellie.png') }}" alt="Sellie Coffee Logo">
            </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Sellie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="Menu">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="Produk">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="{{ url('/profile') }}">Your Profile</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 text-end" id="navbar-btn">
                @guest
                    <a href="{{ url('login') }}" class="login-button">Login</a>
                    <a href="{{ url('register') }}" class="register-button">Register</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @else
                    @if (auth()->user()->roles === 'ADMIN')
                        <a href="{{ url('view_product') }}" class="admin-button">Admin</a>
                    @endif
                    <form class="btn" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <input class="logout-button" type="submit" value="Logout">
                    </form>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                @endguest
            </div>
        </div>
    </nav>

    <!-- End Navbar -->

    @include('home.include.body')

    @include('home.include.footer')

</body>

</html>
