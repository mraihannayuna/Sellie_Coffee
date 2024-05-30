<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{ asset('') }}" alt="..."
                    class="img-fluid rounded-circle"></div>
            <div class="title">
                <h1 class="h5">Wisnu Birowo</h1>
                <p>CEO of Sellie Coffee</p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">


            <li><a href="{{ url('/') }}"><i class="icon-home"></i>User View </a></li>
            <li><a href="{{ url('view_product') }}"> <i class="icon-grid"></i>View Product</a></li>
            <li><a href="{{ url('view_category') }}"> <i class="icon-grid"></i>Category </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                    <i class="icon-windows"></i>Products</a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{ url('add_product') }}">Add Product</a></li>
                    <li><a href="{{ url('add_coffee') }}">Add Coffee</a></li>
                </ul>
            </li>

    </nav>
    <!-- Sidebar Navigation end-->
