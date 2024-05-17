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
                @if (auth()->user()->roles === 'ADMIN')
                    <a href="{{ url('admin/dashboard') }}" class="btn btn-outline-light">admin</a>
                @endif
                <form class="btn" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <input class="btn btn-outline-light" type="submit" value="Logout">
                </form>
            @endguest

    </header>
</div>
