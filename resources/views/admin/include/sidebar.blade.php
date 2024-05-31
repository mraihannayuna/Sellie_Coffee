<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar">
                <img src="{{ URL::asset('assets/Screenshot 2024-05-31 at 09.53.23.png') }}" alt="Foto Wisnu Birowo"
                    class="img-fluid rounded-circle"></div>
            <div class="title">
                <h1 class="h5 text-light">Wisnu Birowo</h1>
                <p class="text-light">CEO of Sellie Coffee</p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading text-light">Main</span>
        <ul class="list-unstyled">


            <li><a class="text-light" href="{{ url('/') }}"><i class="icon-home"></i>User View </a></li>
            <li><a class="text-light" href="{{ url('view_product') }}"> <i class="icon-grid"></i>View Product</a></li>
            <li><a class="text-light" href="{{ url('view_category') }}"> <i class="icon-grid"></i>Category </a></li>
            <li><a class="text-light" href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                    <i class="icon-windows"></i>Products</a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a class="text-light" href="{{ url('add_product') }}">Add Menu</a></li>
                    <li><a class="text-light" href="{{ url('add_coffee') }}">Add Product</a></li>
                </ul>
            </li>

    </nav>
    <!-- Sidebar Navigation end-->
