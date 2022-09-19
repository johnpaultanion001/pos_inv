<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\ProductSizePrice;
use Validator;

class OrderController extends Controller
{
    public function view(Product $product){
        foreach($product->products_sizes_prices()->get() as $psp){
            $sps[] = array(
                'size_id'      => $psp->size->id,
                'size'         => $psp->size->name,
                'price'        => $psp->price,
                'stock'        => $psp->stock, 
            );
        }

        $product_d = [
            'name'         => $product->name,
            'category'     => $product->category->name,
            'image'        => $product->image,
        ];

        return response()->json([
            'product'      =>  $product_d,
            'sps'          =>  $sps,
        ]);

    }

    public function order(Request $request, Product $product)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'qty'  => ['required' ,'integer','min:1'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $sps = ProductSizePrice::where('product_id', $product->id)
                                 ->where('size_id', $request->input('size') )
                                 ->first();

        if($request->input('qty') > $sps->stock){
            return response()->json(['errorstock' => 'Must be less than the stock.']);
        }
                        
        $amount = $sps->price * $request->input('qty');
        OrderProduct::updateOrcreate(
            [
                'user_id'    => auth()->user()->id,
                'product_id' => $product->id,
                'size_id'    => $sps->size->id,
                'isCheckout' => false,
            ],
            [
                'user_id'    => auth()->user()->id,
                'product_id' => $product->id,
                'size_id'    => $sps->size->id,
                'qty'        => $request->input('qty'),
                'amount'     => $amount,
                'price'      => $sps->price,
            ]
        );

        return response()->json(['success' => 'Ordered Successfully.']);
    }

    public function orders(){
        date_default_timezone_set('Asia/Manila');
        $orders = OrderProduct::where('user_id', auth()->user()->id)
                                 ->where('isCheckout', false)
                                 ->latest()
                                 ->get();

        return view('customer.orders',compact('orders'));
    }
    public function edit(OrderProduct $order){
        foreach($order->product->products_sizes_prices()->get() as $psp){
            $sps[] = array(
                'size_id'       => $psp->size->id,
                'size'          => $psp->size->name,
                'price'         => $psp->price,
                'stock'         => $psp->stock, 
                'selected_size_active' => $psp->size->id == $order->size->id ? 'active':'',
                'selected_size' => $psp->size->id == $order->size->id ? 'checked':'',
            );
        }

        $orders = [
            'name'         => $order->product->name,
            'category'     => $order->product->category->name,
            'image'        => $order->product->image,
            'qty'          => $order->qty,
        ];

        return response()->json([
            'order'      =>  $orders,
            'sps'        =>  $sps,
        ]);

    }

    public function update(Request $request, OrderProduct $order)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'qty'  => ['required' ,'integer','min:1'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $sps = ProductSizePrice::where('product_id', $order->product->id)
                                 ->where('size_id', $request->input('size') )
                                 ->first();

        if($request->input('qty') > $sps->stock){
            return response()->json(['errorstock' => 'Must be less than the stock.']);
        }
                        
        $amount = $sps->price * $request->input('qty');
        OrderProduct::find($order->id)->update(
            [
                'size_id'    => $sps->size->id,
                'qty'        => $request->input('qty'),
                'amount'     => $amount,
                'price'      => $sps->price,
            ]
        );

        return response()->json(['success' => 'Ordered Updated Successfully.']);
    }

    public function cancel(OrderProduct $order){
        $order->delete();
        return response()->json(['success' => 'Ordered Canceled Successfully.']);
    }

    public function checkout(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $orderproducts = OrderProduct::where('user_id', auth()->user()->id)
                            ->where('isCheckout', false)->get();

        $ordercount = OrderProduct::where('user_id', auth()->user()->id)
                                    ->where('isCheckout', false)->count();

        if($ordercount < 1){
            return response()->json(['nodata' => 'No data available']);
        }       

        $orders = Order::create([
            'user_id'   => auth()->user()->id,
            'status'   => 'APPROVED',
            'customer' => $request->get('customer')
        ]);
        foreach($orderproducts as $order){
            $sps = ProductSizePrice::where('product_id', $order->product->id)
                                 ->where('size_id', $order->size->id)
                                 ->first();
            if($order->qty > $sps->stock){
                Order::find($orders->id)->delete();
                return response()->json(['no_stock' => 'Out of stock <br>
                                                        Product: '.$order->product->name.
                                                        '<br> Qty: '.$order->qty. 
                                                        '<br> Available Stock: '.$sps->stock]);
            }else{
                $sps->decrement('stock', $order->qty);
                OrderProduct::where('id', $order->id)
                                ->update([
                                    'order_id' => $orders->id,
                                    'isCheckout' => true,
                                ]);
            }
        }
        return response()->json(['success' => 'Ordered Successfully Checkout.']);
        
    }
    
    public function orders_history(){
        $orders = Order::where('user_id', auth()->user()->id)
                            ->where('status', "APPROVED")->latest()->get();

        return view('customer.orders_history' ,compact('orders'));
    }
    public function cancel_order(Order $order){
        Order::find($order->id)
            ->update([
                'status'    => 'CANCELLED'
            ]);

        foreach($order->orderproducts()->get() as $order_p){
            ProductSizePrice::where('product_id', $order_p->product->id)
                        ->where('size_id', $order_p->size->id)
                        ->increment('stock', $order_p->qty);
        }


        return response()->json(['success' => 'Successfully Cancelled.']);
    }
    
   
}
