<!DOCTYPE html>
<html>
  <head>
    @include('admin.include.css')

    <style type="text/css">

    input[type='text'] {
        width: 400px;
        height: 50px;
    }

    .div_design {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
    }

    .table_design {
        text-align: center;
        margin: auto;
        border: 2px solid skyblue;
        margin-top: 50px;
        width: 1000px;
    }

    td {
        color: white;
        padding: 10px;
        border: 1px solid skyblue;
    }

    th {
        background-color: skyblue;
        padding: 50px;
        font-size: 20px;;
        font-weight: bold;
        color: white;
    }

    </style>

  </head>
  <body>

    @include('admin.include.header')

    @include('admin.include.sidebar')

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h1 style="color: white;">Edit This Category</h1>

        <div class="div_design">

            <form action="{{url('update_category',$data->id)}}" method="POST">
                @csrf

                <div>
                    <input type="text" value="{{$data->category_name}}" name="category">
                    <input class="btn btn-info btn-lg" type="submit" value="update category">
                </div>

            </form>

        </div

        <!-- JavaScript files-->

    {{--? sweet alert cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.include.js')
  </body>
</html>
