<!DOCTYPE html>
<html>
  <head>
    @include('admin.include.css')

    <style type="text/css">

        .div_design {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #E8C872;
            border-radius: 20px
        }

        h1 {
            color: black;
        }

        label{
            display: inline-block;
            width: 200px;
            font-size: 18px !important;
            color: black !important;
        }

        input[type='text']{
            width: 350px;
            height: 50px;
        }

        textarea{
            width: 450px;
            height: 80px;
        }

        .input_design{
            padding: 15px;
            display: flex;
        }

    </style>

  </head>
  <body>

    @include('admin.include.header')

    @include('admin.include.sidebar')

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h1>Add Products</h1>

            <div class="div_design">

                <form action="{{url('upload_coffee')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input_design">
                        <label>Product Image</label>
                        <input type="file" name="image" required>
                    </div>

                    <div class="input_design">
                        <label>Product Title</label>
                        <input type="text" name="title" required>
                    </div>

                    <div class="input_design">
                        <label>Product Description</label>
                        <textarea name="description" required></textarea>
                    </div>

                    <div class="input_design">
                        <label>Product Price</label>
                        <input type="text" name="price" required>
                    </div>

                    <div class="input_design">
                        <label>Product Quantity</label>
                        <input type="number" name="quantity" required>
                    </div>

                    <div class="input_design">
                        <label>Product Category</label>
                        <select name="category_id" required>
                          <option value="Not Selected">Select The Category</option>
                          @foreach ($category as $option)
                            <option value="{{ $option->id }}">{{ $option->category_name }}</option>
                          @endforeach
                        </select>
                      </div>

                    <div class="input_design">
                        <input class="btn btn-success btn-lg" type="submit" value="add coffee">
                    </div>

                </form>

            </div>

                <!-- JavaScript files-->

    {{--? sweet alert cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.include.js')
  </body>
</html>
