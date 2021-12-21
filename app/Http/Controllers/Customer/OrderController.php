<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use Validator;

class OrderController extends Controller
{
    public function addtocart(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'qty' => ['required' ,'integer','min:1'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
       
        $product = Product::where('id', $request->input('hidden_id'))->first();

        $orders_qty = OrderProduct::where('user_id', auth()->user()->id)->where('product_id', $request->input('hidden_id'))->sum('qty');

        if($request->input('qty') > $product->stock){
            return response()->json(['errorstock' => 'Must be less than the stock.']);
        }
        $order_qty_qty = $orders_qty + $request->input('qty');
        if($order_qty_qty > $product->stock){
            return response()->json(['errorstock' => 'Must be less than the stock.']);
        }

        $amount = $product->price * $request->input('qty');

        OrderProduct::create([
            'user_id'    => auth()->user()->id,
            'product_id' => $request->input('hidden_id'),
            'qty'        => $request->input('qty'),
            'amount'     => $amount,
        ]);

        return response()->json(['success' => 'Added Successfully.']);
    }

    public function orders()
    {
        $orders = OrderProduct::where('user_id', auth()->user()->id)
                                 ->where('isCheckout', false)->paginate(5);
        return view('customer.orders' ,compact('orders'));
    }

    public function checkout()
    {
        $orderproducts = OrderProduct::where('user_id', auth()->user()->id)
                            ->where('isCheckout', false)->get();

        $ordercount = OrderProduct::where('user_id', auth()->user()->id)
                                    ->where('isCheckout', false)->count();

        if($ordercount < 1){
            return response()->json(['nodata' => 'No data available']);
        }       

        $orders = Order::create([
            'user_id'   => auth()->user()->id
        ]);
        foreach($orderproducts as $order){
            Product::where('id', $order->product->id)->decrement('stock', $order->qty);
            OrderProduct::where('id', $order->id)
                            ->update([
                                'order_id' => $orders->id,
                                'isCheckout' => true,
                            ]);
        }
        return response()->json(['success' => 'Successfully Checkout.']);
        
    }
    public function orders_history(){
        $orders = Order::where('user_id', auth()->user()->id)
                            ->where('status', "PENDING")->get();
        $orders_approved = Order::where('user_id', auth()->user()->id)
                            ->where('status', "APPROVED")->get();
        return view('customer.orderHistory' ,compact('orders' , 'orders_approved'));
    }
}
