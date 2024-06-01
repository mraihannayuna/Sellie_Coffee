<!DOCTYPE html>
<html>
  <head>
    @include('admin.include.css')

    <style type="text/css">

    .div_design {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
        flex-direction: column;
    }

    th {
        background-color: #E8C872;
        font-size: 19px;
        font-weight: bold;
        padding: 15px;
    }

    .table_design {
        border: 2px solid #E8C872;
        width: 1000px;
    }

    td {
        border: 1px solid #E8C872;
        text-align: center;
        height: 120px;
    }

    tr {
        text-align: center;
        color: black;
    }

    input[type='search'] {
        width: 500px;
        height: 60px;
        margin-top: 50px
    }

    h1{
        color: black;
    }

    </style>

  </head>
  <body>

    @include('admin.include.header')

    @include('admin.include.sidebar')

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h1>------------------------- Products -------------------------</h1>

            <div class="div_design">

                <table class="table_design">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($products as $data)

                    <tr>
                        <td>{{$data->title}}</td>
                        <td>{!!Str::limit($data->description,50)!!}</td>
                        <td>{{$data->category->category_name}}</td>
                        <td>{{$data->price}}</td>
                        <td>
                            <img height="120" width="120" src="products/{{$data->image}}" alt="gaada foto :(">
                        </td>

                        <td>
                            <a class="btn btn-success" href="{{url('edit_product',$data->id)}}">Update</a>
                        </td>

                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$data->id)}}">Delete</a>
                        </td>

                    </tr>

                    @endforeach

                </table>
                {{$products->onEachSide(1)->links()}}
            </div>

            <h1>-------------------------- Coffee --------------------------</h1>

            <div class="div_design">

                <table class="table_design">
                    <tr>
                        <th>Coffee Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($coffee as $data)

                    <tr>
                        <td>{{$data->title}}</td>
                        <td>{!!Str::limit($data->description,50)!!}</td>
                        <td>{{$data->category->category_name}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>
                            <img height="120" width="120" src="products/{{$data->image}}" alt="gaada foto :(">
                        </td>

                        <td>
                            <a class="btn btn-success" href="{{url('edit_product',$data->id)}}">Update</a>
                        </td>

                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$data->id)}}">Delete</a>
                        </td>

                    </tr>

                    @endforeach

                </table>
            </div>

          </div>
        </div>
    </div>

        <!-- JavaScript files-->

        {{--? delete button  --}}
        <script type="text/javascript">
            function confirmation(ev){
                ev.preventDefault();

                var urlToRedirect = ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                {{--? swal = sweet alert --}}
                swal({
                    title:"Are You Sure You Want To Delete This?",
                    text:"this delete will be permanent",
                    icon:"warning",
                    buttons: true,
                    dangerMode:true,
                })

                .then((willCancel)=>{
                   if(willCancel) {
                    window.location.href=urlToRedirect;
                   }
                });

            }
        </script>
            {{--! End delete button  --}}

            {{--? sweet alert cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.include.js')

  </body>
</html>
