<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css') 
    <style>
        .div_des{
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 60px
        }
        .table_deg{
            border:2px solid greenyellow;
        }
        th{
            background-color: skyblue;
            color:white;
            font-size:20px;
            font-weight: bold;
            padding: 15px
        }
        td{
            border:1px solid skyblue;
            text-align:center;
        }
        input[type='search']
        {
          width : 500px;
          height : 60px;
          margin-left: 50px;
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

            <form action="{{url('product_search')}}" method="get">
              @csrf
              <input type="search" name="search">
              <input  type="submit" class="btn btn-secondary" value="Search">
            </form>

           <h1 style="color: aliceblue">View Product</h1>
            <div class="div_des">
                <table class="table_deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Product Category</th>
                        <th>Price(Rupees)</th>
                        <th>Quantity</th>
                        <th>ImageName</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Update</th>
                        
                    </tr>
                    @foreach($product as $products)
                    {{-- I wrote 'products' because I will use pagination else I would have written 'product'--}}
                    <tr>
                        <td>{{($products->title)}}</td>
                        <td>{!!Str::limit($products->description,50)!!}</td>
                        {{-- this is for character limit --}}
                        <td>{{($products->category)}}</td>
                        <td>{{($products->price)}}</td>
                        <td>{{($products->quantity)}}</td>
                        <td>{{($products->image)}}</td>
                        <td>
                            <img height="150" src="products/{{$products->image}}" alt="">
                        </td>
                        <td>
                          <a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

                    
            </div>
            <div class="div_des"> {{$product->onEachSide(2)->links()}}</div>
               

		 </div>
      </div>
    </div>
    <!-- JavaScript files-->

    <script>
        function confirmation(ev){
          ev.preventDefault();

          var urlToRedirect = ev.currentTarget.getAttribute('href');


          console.log(urlToRedirect);
       

          swal({
            title : "Are you sure that you want to delete this ?",
            text : "This delete will be permanent",
            icon : "warning" , 
            buttons : true,
            dangermode : true,

          }) 
        

          .then((willCancel)=>{
            if(willCancel)
            {
              window.location.href=urlToRedirect;
            }
          
          });
          
        }
        
      </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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