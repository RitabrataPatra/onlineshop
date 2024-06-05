<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function Home(){
        $product = Product::all();
        $user = Auth::user();
        // $userid= $user->id;
        $userid = auth()?->user()?->id;
        $count = Cart::where('user_id',$userid)->count();
        
        return view ('Home.index',compact('product','count'));
    }

    public function login_home(){
        $product = Product::all();
        $user = Auth::user();
        // $userid= $user->id;
        $userid = auth()?->user()?->id;
        $count = Cart::where('user_id',$userid)->count();
        return view ('Home.index',compact('product','count'));
    }

    public function product_details($id){
       $data = Product::find($id);
       $user = Auth::user();
        // $userid= $user->id;
        $userid = auth()?->user()?->id;
        $count = Cart::where('user_id',$userid)->count();
        return view ('Home.product_details',compact('data','count'));
    }
    public function add_cart($id){
        $product_id=$id;
        $user=Auth::user();
        $user_id = $user->id;
        $data= new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        toastr()->timeOut(5000)->closeButton()->success('Product has been added to the cart!');

        return redirect()->back();
    }
    public function mycart(){
        $user = Auth::user();
        // $userid= $user->id;
        $userid = auth()?->user()?->id;
        $count = Cart::where('user_id',$userid)->count();
        $cart=Cart::where('user_id',$userid)->get();

        return view('Home.mycart',compact('count','cart'));
    }

    public function delete_cart($id){
        $cart = Cart::find($id);
        $cart->delete();
        toastr()->timeOut(5000)->closeButton()->success('Product has been removed!');

        return redirect()->back();
    }
    public function confirm_order(Request $request){
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid= Auth::user()->id;
        $cart  =Cart::where('user_id',$userid)->get();

        foreach ($cart as $carts) {
            $order = new Order;
            $order->name= $name;
            $order->rec_address= $address;
            $order->phone= $phone;
            $order->user_id= $userid;

            $order->product_id = $carts->product_id;

            $order->save();
            
        }
        $cart_remove = Cart::where('user_id',$userid)->get();

        foreach ($cart_remove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        } 
        // echo "Nothing in cart" ;
        toastr()->timeOut(5000)->closeButton()->success('Order has been confirmed!!!');
       
        return redirect()->back();
    }
} 
