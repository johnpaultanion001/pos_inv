<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
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
        }

        if($order->status == "APPROVED"){
            Order::find($order->id)->update([
                'status'    => 'PENDING',
            ]);
        }

        return response()->json(['success' => 'Updated Successfully.']);

    }
    
}
