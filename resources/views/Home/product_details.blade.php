<!DOCTYPE html>
<html>

<head>
    @include('Home.css')
    <style>
        .div_center{
            display : flex;
            align-items: center;
            justify-content: center;
            padding : 20px
        }
        .detail-box{
            padding: 8px;
            text-align: center
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
    
        <!---Product Details-->

        <section class="shop_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Latest Products
                    </h2>
                </div>
                <div class="row">
                  
                        <div class="col-md-12 ">
                            <div class="box">
                                
                                    <div class="div_center">
                                        <img  src="/products/{{$data->image}}" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h6>{{$data->title}}</h6>
                                        <h6>Price<span><br>Rs {{$data->price}}</span> </h6>
        
                                    </div>
                                    <div class="detail-box">
                                        <h6>Category : {{$data->category}}</h6>
                                        <h6>Quantity<span><br> {{$data->quantity}}</span> </h6>
        
                                    </div>
                                    <div class="detail-box">
                                       
                                        <p><br> {{$data->description}}</p>
        
                                    </div>
                            </div>
                        </div>
                   
                </div>    
        </section>
        
        <!--Product details end-->



    <!-- contact section -->

   

    <!-- end contact section -->
    <!-- info section -->

    @include('Home.footer')

</body>

</html>
