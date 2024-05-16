<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    @include('home.include.head')

</head>

<body>

    @include('home.include.navbar')

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
                                    <a class="btn btn-primary" href="#">Add To Cart</a>
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
