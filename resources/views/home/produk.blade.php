<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

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
                        Carts
                        [<span class="text-white fw-bold">{{$count}}</span>]
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


    <section class="text-center mb-4">
        <h1 class="text-dark fw-semibold" style=" font-family: 'DM sans', sans-serif !important;">Our<span
                style="color: #dfad6f !important; font-family: 'DM sans', sans-serif !important;"
                class="ms-2 mb-2">Products</span></h1>
        <h3 class="fs-6 fw-lighter"
            style="letter-spacing: 2px !important;color: #322C2B !important; font-family: 'DM sans', sans-serif !important;">
            Fresh Coffee beans from us to
            you.</h3>
    </section>

    <div class="py-5">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($coffee as $product)
                    <div class="col mb-4">
                        <div class="card shadow-sm" style="height: 100%;">
                            <img class="card-img-top" src="products/{{ $product->image }}" alt="failed to load"
                                style="object-fit: cover; height: 200px;">
                            <div class="card-body">
                                <h2 class="card-title">{{ $product->title }}</h2>
                                <p class="card-text">{{ $product->description }}</p>
                                <h3 class="card-text">Rp{{ $product->price }}</h3>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="btn btn-primary" href="{{url('add_cart',$product->id)}}">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    </div>
    </div>

    @include('home.include.footer')

</body>

</html>
