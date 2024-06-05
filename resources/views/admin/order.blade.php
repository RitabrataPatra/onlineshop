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
           
            <div class="div_des">
                <table class="table_deg"> 
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Address</th>
                        <th>Customer Phone</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Change Status</th>
    
                    </tr>
                    @foreach ($data as $data)
                        
                    
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->rec_address}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->product->title}}</td>
                        <td>{{$data->product->price}}</td>
                        <td>
                            <img height="100"src="/products/{{$data->product->image}}" alt="">
                        </td>
                        <td>
                          @if ($data->status=='in progress')
                            <span style="color : red">{{$data->status}}</span>
                        @elseif($data->status=='On the way')
                        <span style="color : yellow">{{$data->status}}</span>

                        @else
                        <span style="color : green">{{$data->status}}</span>
                          @endif  
                        
                        </td>
                        <td style="padding: 20px">
                            <a class="btn btn-primary" href="{{url('ontheway',$data->id)}}">On The Way</a>
                            <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered</a>
                        </td>
   
    
                    </tr>
                    @endforeach
                </table>
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