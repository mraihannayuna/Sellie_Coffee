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
                            <a class="nav-link mx-lg-2" aria-current="page" href="/">Home</a>
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
                @else
                    @if (auth()->user()->roles === 'ADMIN')
                        <a href="{{ url('view_product') }}" class="admin-button">Admin</a>
                    @endif
                    <form class="btn" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <input class="logout-button" type="submit" value="Logout">
                    </form>
                    <a href="mycart" class="cart-button"><i class="fa-solid fa-cart-shopping"></i></a>
                    <span class='badge badge-warning' id='lblCartCount'> {{ $count }} </span>
                @endguest
            </div>
        </div>
    </nav>

    <div style="margin-top: 150px !important;background-color: #dfad6 !important;" class="container custom-container">
        <h2 class="text-center mb-4">Shopping Cart</h2>
        @if ($count == 0)
            <h4>You havent added anything to your cart [<span class="text-primary fw-bold">{{ $count }}</span>]
                </h3>
            @elseif ($count > 0)
            <h4>Total items added to your cart [<span class="text-primary fw-bold">{{ $count }}</span>]</h3>
        @endif

        <table class="table table-hover table-striped cart-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $counter = 1; @endphp
                @foreach ($carts as $cart)
                    <tr>
                        <td class="text-center fs-1">{{ $counter }}</td>
                        <td class="cardmg">
                            <img class="card-img-top" src="products/{{ $cart->product->image }}"
                                alt="{{ $cart->product->title }}">
                        </td>
                        <td>{{ $cart->product->title }}</td>
                        <td>Rp{{ $cart->product->price }}</td>
                        <td>
                            <a class="btn btn-danger remove-from-cart"
                                href="{{ url('removeFromCart', $cart->id) }}">-</a>
                        </td>
                    </tr>
                    @php $counter++ @endphp
                @endforeach
            </tbody>
        </table>
        @php
            $formattedTotal = number_format($total, 0, ',', '.');
        @endphp

        <h2 class="text-center mb-4">Total: Rp{{ $formattedTotal }}</h2>

        <!-- Checkout Button -->
        <div class="text-center">

            @if ($counter == 1)
                <a href="Produk" class="btn btn-warning mb-4">Add product to cart</a>
            @elseif ($counter > 1)
                <form action="{{ route('initiate-payment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="total_amount" value="{{ $total }}">
                    <button type="submit" class="btn btn-success mb-4">Proceed to Checkout</button>
                </form>
            @endif

        </div>

    </div>

    @include('home.include.footer')

</body>

</html>
