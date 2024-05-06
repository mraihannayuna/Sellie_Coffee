<!DOCTYPE html>
<html>
  <head>
    @include('admin.include.css')

    <style type="text/css">

        .div_design{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        label{
            display: inline-block;
            width: 200px;
            padding: 20px
        }

        inpu[type='text']{
            width: 300px;
        }

        textarea{
            width: 450px;
            height: 100px;
        }

    </style>

  </head>
  <body>

    @include('admin.include.header')

    @include('admin.include.sidebar')

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h2>Update Product</h2>

            <div class="div_design">

                <form action="{{url('update_product',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label>Title</label>
                        <input type="text" name="title" value="{{$data->title}}">
                    </div>
                    <div>
                        <label>Description</label>
                        <textarea name="description">{{$data->description}}</textarea>
                    </div>
                    <div>
                        <label>Price</label>
                        <input type="text" name="price" value="{{$data->price}}">
                    </div>
                    <div>
                        <label>Quantity</label>
                        <input type="text" name="quantity" value="{{$data->quantity}}">
                    </div>
                    <div>
                        <label>Category</label>

                        <select name="category">

                            <option value="{{$data->category}}">
                                {{$data->category}}
                            </option>

                            @foreach ($category as $t)

                            <option value="{{$t->category_name}}">{{$t->category_name}}</option>

                            @endforeach

                        </select>

                    </div>
                    <div>
                        <label>Current Image</label>
                        <img height="120" width="120" src="/products/{{$data->image}}" alt="gaada gambar :(">
                    </div>
                    <div>
                        <label>New Image</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input class="btn btn-success btn-lg" type="submit">
                    </div>

                </form>

            </div>

        <!-- JavaScript files-->

    @include('admin.include.js')
  </body>
</html>
