<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .div_des{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top:60px
           
       }
       h1{
        color : white;
        
       }
       label{
        display: inline-block;
        width: 250px;
        color: white!important;
        font-size : 20px!important;
       }

       .input_des{
        padding:10px
       }
    </style>
  </head>
  <body>
	<!--Header Starts-->
	@include('admin.header')
	<!--Header Ends-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
           <h1>Add Product</h1>
            <div class="div_des">
                <form action="{{url('upload_product')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="input_des">
                        <label for="">Product Title</label>
                        <input type="text" name=title>
                    </div>

                    <div class="input_des">
                        <label for="">Description</label>
                        <textarea name="description"  cols="30" rows="10" required></textarea>
                    </div>

                    <div class="input_des">
                        <label for="">Price</label>
                        <input type="number" name="price">
                    </div>

                    <div class="input_des">
                        <label for="">Quantity</label>
                        <input type="number" name="qty">
                    </div>

                    <div class="input_des">
                        <label for="">Product Category</label>
                        <select name="category" id="" required>
                            <option value="">
                                Select
                            </option>
                            @foreach ($category as $category)
                                
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="input_des">
                        <label for="">Product Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="input_des">
                        
                        <input class="btn btn-primary" type="submit" value="Add Product">
                    </div>
                </form>
            </div>




		 </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="/{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>