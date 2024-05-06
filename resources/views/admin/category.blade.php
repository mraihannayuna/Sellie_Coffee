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

            <h1 style="color: white;">Category</h1>

        <div class="div_design">

            <form action="{{url('add_category')}}" method="POST">
                @csrf

                <div>
                    <input type="text" name="category">
                    <input class="btn btn-primary btn-lg" type="submit" value="add category">
                </div>

            </form>

        </div>

        <div>
            <table class="table_design">
                 {{--? Table Row --}}
                <tr>
                     {{--? Table Header --}}
                    <th>Category Name</th>
                    <th style="color: yellow;">Edit</th>
                    <th style="color: red;">Delete</th>
                </tr>

                @foreach($data as $data)

                     {{--? Table Data --}}
                    <td>{{$data->category_name}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{url('edit_category',$data->id)}}">Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category',$data->id)}}">Delete</a>
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
