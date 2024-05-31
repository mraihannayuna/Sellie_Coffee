<header class="header">
    <nav style="background-color: #A27B5C !important" class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase">
                        <img style="height: 60px;" src="{{ URL::asset('assets/sc.svg') }}" alt="Sellie Coffee logo">
                    </div>
                    <div class="brand-text brand-sm">
                        <img style="height: 40px;" src="{{ URL::asset('assets/sc.svg') }}" alt="Sellie Coffee logo">
                    </div>
                </a>
                <!-- Sidebar Toggle Btn-->
                <button class="sidebar-toggle">
                    <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
                </button>
            </div>

            <!-- Log out               -->
            <form action="{{ url('logout') }}" method="POST">
                @csrf
                <input class="btn btn-danger" type="submit" value="Logout">
            </form>
        </div>
        </div>
    </nav>
</header>
