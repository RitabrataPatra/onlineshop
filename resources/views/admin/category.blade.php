<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        input[type='text']
        {
          width:400px;
          height: 50px;
        }
        .div_des{
          display: flex;
          align-content: center;
          justify-content: center;
          margin: 30px;
        }
        .table_deg{
           
           display: flex;
          align-content: center;
          justify-content: center;
        }
        th{
          text-align: center;
            background-color: skyblue;
            color:white;
            font-size:20px;
            font-weight: bold;
            padding: 15px
        }
        td {
            width: 300px;
            border:1px solid skyblue;
            text-align:center;
            padding: 20px
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
             <h1 style="color: white">Add Category</h1>
            <div class="div_des">

              
            <form action="{{url('add_category')}}" method="POST">
              @csrf
                <div>
                    <input type="text" name="category" id="">
                
                    <input class="btn btn-primary" type="submit" value="Add Category" id="">
                </div>
            </form>
          </div>
          <div>

            <table class="table_deg">
              <tr>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              @foreach ($data as $data)
                  
              
              <tr>
                <td >
                  {{$data->category_name}} </td>
                  
                    <td>
                      <a class="btn btn-success" href="{{url('edit_category',$data->id)}}">Edit</a>
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