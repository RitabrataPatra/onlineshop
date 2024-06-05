<!DOCTYPE html>
<html>

<head>
    @include('Home.css')
    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        table{
            border : 2px solid black;
            text-align: center;
            width: 800vw;
        }
        th{
            border : 2px solid black;
            text-align: center;
            color: white; 
            font-size: 20px;
            font-weight: 400;
            background-color: black
        }
        td{
            border: 1px solid slategray
        }
        .order_deg{
           /* margin-left: 10px; */
        }
        label{
            display: inline-block;
            width: 150px;
            border-radius: 10px;
        }
        .div_gap{
            padding: 20px;
            text-align: center;
        }
        input,textarea{
            border-radius: 6px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('Home.header')
        <!-- end header section -->
        <!-- slider section -->

        

        <!-- end slider section -->
    </div>
    <div class="div_deg">

        <div class="order_deg">
            <form action="{{url('confirm_order')}}" method="POST">
                @csrf
                <div class="div_gap">

                    <label for="">Reciever Name</label>
                    <input type="text" name="name" value="{{Auth::user()->name}}">
                </div >
                <div class="div_gap">

                    <label for="">Reciever's Address</label>
                    <textarea value="{{Auth::user()->address}}" name="address" id="" cols="30" rows="10"></textarea>
                </div>
                
                <div class="div_gap">

                    <label for="">Reciever's Phone'</label>
                    <input type="text" name="phone" value="{{Auth::user()->phone}}">
                </div>
                <div class="div_gap">
                    <input class="btn btn-primary" type="submit" value="Place Order">
                </div>
          


            </form>


        </div>

        <table>
            <tr>
                <th>Product Title</th>
                <th>Price(in USD)</th>
                <th>Image</th>
                <th>Delete</th>
                

            </tr>
            <?php 
            $value = 0;

            
            ?>
            @foreach ($cart as $cart)

            <tr>
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}}</td>
                {{-- <td>{{$cart->product->image}}</td> --}}
               <td>
                <img height="120px"src="/products/{{$cart->product->image}}" alt=""></td>

                <td>
                    <a class="btn btn-danger" href="{{url('delete_cart',$cart->id)}}">Delete</a>
                </td>
            </tr>

            <?php 
            $value = $value + $cart->product->price;
            
            ?>
        @endforeach
        </table>
    </div>
            <div class="div_deg" >
                <h3>Total Price : ${{$value}}</h3>
            </div>
        {{-- 
            {{$cart->user_id}}
            <h1>{{$cart->product_id}}</h1>
            <h1>{{$cart->product->title}}</h1>
            <h1>{{$cart->user->name}}</h1>
         --}}
    

    <!-- end contact section -->
    <!-- info section -->

    @include('Home.footer')

</body>

</html>
