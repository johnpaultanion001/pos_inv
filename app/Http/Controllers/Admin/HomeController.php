<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){

            $products = Product::latest()->get();
            $products_today = Product::whereDay('created_at', '=', date('d'))->get();

            $customers = User::where('role', 'customer')->get();
            $customers_today = User::where('role', 'customer')->whereDay('created_at', '=', date('d'))->get();

            $orders = Order::latest()->get();
            $orders_today = Order::whereDay('created_at', '=', date('d'))->get();

            return view('admin.home', compact('products','products_today','customers','customers_today', 'orders','orders_today'));
        }else{
            return redirect()->route('customer.products');
        }
    }
}
