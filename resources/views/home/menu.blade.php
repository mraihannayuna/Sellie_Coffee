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
                class="ms-2 mb-2">Menu</span></h1>
        <h3 class="fs-6 fw-lighter"
            style="letter-spacing: 2px !important;color: #322C2B !important; font-family: 'DM sans', sans-serif !important;">
            Enjoy our traditionally
            brewed coffee.</h3>
    </section>

    <div class="py-5">
        <div class="container">

            <section class="text-center mt-2 mb-4">
                <h1 class="text-dark fw-semibold" style=" font-family: 'DM sans', sans-serif !important;">Manual<span
                        style="color: #dfad6f !important; font-family: 'DM sans', sans-serif !important;"
                        class="ms-2 mb-2">Brew</span></h1>
            </section>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <div class="col">
                    <div class="card shadow-sm">
                        <img class="img-fluid card-img-top" src="/assets/image/Japanese-Iced-Coffee-II.jpg"
                            alt="failed to load">
                        <div class="card-body">
                            <h2>Japanese</h2>
                            <p>Smooth, balanced, delicate.</p>
                            <h3>Rp20.0000</h3>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
    </div>

    @include('home.include.footer')

</body>

</html>
