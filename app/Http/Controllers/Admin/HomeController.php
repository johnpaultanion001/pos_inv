<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\User;
use App\Models\Employee;


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
            $products = Product::latest()->get();
            $products_today = Product::whereDay('created_at', '=', date('d'))->get();

            $employees = Employee::latest()->get();
            $employees_today = Employee::latest()->whereDay('created_at', '=', date('d'))->get();

            $orders = Order::latest()->get();
            $orders_today = Order::whereDay('created_at', '=', date('d'))->get();

            $sales = OrderProduct::where('isCheckout', '1')->sum('amount');
            $sales_today = OrderProduct::where('isCheckout', '1')->whereDay('created_at', '=', date('d'))->sum('amount');
            $sales_record = OrderProduct::where('isCheckout', '1')->whereDay('created_at', '=', date('d'))->get();


            return view('admin.home', compact('products','products_today','employees',
                    'employees_today', 'orders','orders_today','sales','sales_today','sales_record'));
       
        
    }
}
