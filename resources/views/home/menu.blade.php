<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

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
                            <a class="nav-link mx-lg-2" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 active" href="Menu">Menu</a>
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

    <section style="margin-top: 150px !important;" class="text-center mb-4">
        <h1 class="text-dark fw-semibold" style=" font-family: 'DM sans', sans-serif !important;">Our<span
                style="color: #dfad6f !important; font-family: 'DM sans', sans-serif !important;"
                class="ms-2 mb-2">Menu</span></h1>
        <h3 class="fs-6 fw-lighter"
            style="letter-spacing: 2px !important;color: #322C2B !important; font-family: 'DM sans', sans-serif !important;">
            Enjoy our traditionally
            brewed coffee.</h3>
    </section>

    <div class="py-5">
        <div class="container">

                @foreach ($groupedProducts as $categoryName => $products)
                <section class="text-center mt-2 mb-4">
                    <h1 class="text-dark fw-semibold" style="font-family: 'DM sans', sans-serif !important;">
                        {{ $categoryName }}</h1>
                </section>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($products as $product)
                        <div class="col mb-4">
                            <div class="card shadow-sm" style="height: 100%;">
                                <img class="card-img-top" src="products/{{ $product->image }}" alt="failed to load" style="object-fit: cover; height: 200px;">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $product->title }}</h2>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <h3 class="card-text">Rp{{ $product->price }}</h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach




        </div>
    </div>
    </div>
    </div>

    @include('home.include.footer')

</body>

</html>
