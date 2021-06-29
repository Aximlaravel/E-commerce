<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    //
    public function index()
    {
        $data= Product::all();
        return view('product', ['products'=>$data]);
    }

    public function detail($id)
    {
        $data= Product::find($id);

        return view('detail', ['product'=>$data]);
    }

    public function search(Request $request)
    {
        $data=Product::
                where('name', 'like', '%'.$request->input('query').'%')
                ->get();
        return view('search', ['products'=>$data]);
    }
    public function addtocart(Request $request)
    {
        if ($request->session()->has('user')) {
            $cart= new Cart;
            $cart->user_id=isset($request->session()->get('user')['id']) ? $request->session()->get('user', )['id'] : '';
            $cart->product_id=$request->product_id;
            $cart->save();
            return redirect('/');
        }
        return redirect('/login');
    }
    public static function CartItem()
    {
        $userId=isset(Session::get('user')['id'])? Session::get('user')['id'] : '';
        return Cart::where('user_id', $userId)->count();
    }

    public function logout()
    {
        Session::forget('user');

        return redirect('/login');
    }

    public function cartlist()
    {
        $userId=isset(Session::get('user')['id'])? Session::get('user')['id'] : '';
        $data= DB::table('carts')
                ->join('products', 'carts.product_id', 'products.id')
                ->select('products.*', 'carts.id as carts_id')
                ->where('carts.user_id', $userId)
                ->get();


        return view('cartlist', ['products'=>$data]);
    }

    public function removecart($id)
    {
        Cart::destroy($id);
        return redirect()->route('cartlist');
    }

    public function ordernow()
    {
        $userId=isset(Session::get('user')['id'])? Session::get('user')['id'] : '';
        $total = DB::table('carts')
             ->join('products', 'carts.product_id', 'products.id')
             ->where('carts.user_id', $userId)
             ->sum('products.price');


        return view('ordernow', ['total'=>$total]);
    }
    public function orderplace(Request $request)
    {
        $userId=isset(Session::get('user')['id'])? Session::get('user')['id'] : '';
        $allcart=Cart::where('user_id', $userId)->get();
        foreach ($allcart as $cart) {
            $order=new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->address=$request->address;
            $order->status="pending";
            $order->payment_method=$request->payment;
            $order->payment_status="pending";
            $order->save();
        }
        $allcart=Cart::where('user_id', $userId)->delete();
        return redirect()->route("index");
    }
    public function myorder()
    {
        $userId=isset(Session::get('user')['id'])? Session::get('user')['id'] : '';
        $orders = DB::table('orders')
             ->join('products', 'orders.product_id', 'products.id')
             ->where('orders.user_id', $userId)
             ->get();


        return view('myorder', ['orders'=>$orders]);

    }
}
