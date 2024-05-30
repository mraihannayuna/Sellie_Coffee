<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    @include('home.include.head')

</head>

<body>

    <div class="container-fluid" style="background-color: #A27B5C !important;">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 px-4">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img style="height: 65px; width: auto;" src="{{ URL::asset('/assets/sc.svg') }}" alt="failed to load">
                </a>
            </div>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-button nav-link px-2 text-light">Home</a></li>
                <li><a href="Menu" class="nav-button nav-link px-2 text-light">Menu</a></li>
                <li><a href="Produk" class="nav-button nav-link px-2 text-light">Product</a></li>
                <li><a href="Location" class="nav-button nav-link px-2 text-light">Location</a></li>
                <li><a href="Contact" class="nav-button nav-link px-2 text-light">Contact</a></li>
            </ul>

            <div class="col-md-3 text-end">

                @guest
                    <a href="{{ url('login') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ url('register') }}" class="btn btn-outline-light">Register</a>
                @else
                    <a class="btn btn-primary" href="{{url('mycart')}}">
                        Carts[<span class="text-white fw-bold">{{$count}}</span>]

                    </a>
                    @if (auth()->user()->roles === 'ADMIN')
                        <a href="{{ url('view_product') }}" class="btn btn-outline-light">admin</a>
                    @endif
                    <form class="btn" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <input class="btn btn-outline-light" type="submit" value="Logout">
                    </form>
                @endguest

        </header>
    </div>

    <div class="container custom-container mt-5">
        <h2 class="text-center mb-4">Shopping Cart</h2>
        <h4>Total items added to your cart  [<span class="text-primary fw-bold">{{$count}}</span>]</h3>

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
            <form action="{{ route('initiate-payment') }}" method="POST">
                @csrf
                <input type="hidden" name="total_amount" value="{{ $total }}">
                <button type="submit" class="btn btn-success mb-4">Proceed to Checkout</button>
            </form>
        </div>

    </div>

    @include('home.include.footer')

</body>

</html>
