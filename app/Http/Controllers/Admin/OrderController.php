<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\SalesReport;
use Validator;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function orders()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            $orders = Order::latest()->get();
            return view('admin.orders' ,compact('orders'));
        }
        return abort('403');
    }

    public function status(Order $order){

        if($order->status == "PENDING"){
            Order::find($order->id)->update([
                'status'    => 'APPROVED',
            ]);
            foreach($order->orderproducts as $order){
                $amount = $order->product->price * $order->qty;
                $profit = $order->product->profit * $order->qty;
                SalesReport::create([
                    'product_id'    => $order->product_id,
                    'order_id'      => $order->order_id,
                    'sold'          => $order->qty,
                    'profit'        => $profit,
                    'amount'        => $amount,
                ]);
            }
        }

        if($order->status == "APPROVED"){
            Order::find($order->id)->update([
                'status'    => 'PENDING',
            ]);
            foreach($order->orderproducts as $order){
                SalesReport::where('order_id', $order->order_id)->delete();
            }
        }

        return response()->json(['success' => 'Updated Successfully.']);

    }
    public function receipt(Order $order){
        return view('admin.receipt' ,compact('order'));
    }

    public function sales_reports($filter){
        if($filter == 'daily'){
            $title_filter  = 'From: ' . date('F d, Y') . ' To: ' . date('F d, Y');
            $sales = SalesReport::latest()->whereDate('created_at', Carbon::today())->get();
        }
        elseif($filter == 'monthly'){
            $title_filter  = 'From: ' . date('F '. 1 .', Y') . ' To: ' . date('F '. 31 .', Y');
            $sales = SalesReport::latest()->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->get();
        }
        elseif($filter == 'yearly'){
            $title_filter  = 'From: ' .'Jan 1'. date(', Y') . ' To: ' .'Dec 31'. date(', Y');
            $sales = SalesReport::latest()->whereYear('created_at', '=', date('Y'))->get();
        }
        elseif($filter == 'all'){
            $title_filter  = 'ALL RECORDS';
            $sales = SalesReport::latest()->get();
        }else{
            $title_filter  = 'From: ' . date('F d, Y') . ' To: ' . date('F d, Y');
            $sales = SalesReport::latest()->whereDate('created_at', Carbon::today())->get();
        }

        return view('admin.sales_reports.sales_reports', compact('sales','title_filter'));
       
    }
    
}
