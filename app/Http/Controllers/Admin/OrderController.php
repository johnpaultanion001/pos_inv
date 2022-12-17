<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\UploadedTransaction;
use Validator;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function orders()
    {
            $orders = Order::latest()->get();
            return view('admin.orders' ,compact('orders'));
      
    }

    public function sales_reports($filter){

        $userrole = auth()->user()->role;

        if($filter == 'daily'){
            $title_filter  = 'From: ' . date('F d, Y') . ' To: ' . date('F d, Y');
            $sales = OrderProduct::latest()->whereDate('created_at', Carbon::today())
                                ->where('isCheckout', true)->get();
        }
        elseif($filter == 'weekly'){
            $title_filter  = 'From: ' . Carbon::now()->startOfWeek()->format('F d, Y') . ' To: ' . Carbon::now()->endOfWeek()->format('F d, Y');
            $sales = OrderProduct::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                    ->where('isCheckout', true)->get();
        }
        elseif($filter == 'monthly'){
            $title_filter  = 'From: ' . date('F '. 1 .', Y') . ' To: ' . date('F '. 31 .', Y');
            $sales = OrderProduct::latest()->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))
                                    ->where('isCheckout', true)->get();
        }
        elseif($filter == 'yearly'){
            $title_filter  = 'From: ' .'Jan 1'. date(', Y') . ' To: ' .'Dec 31'. date(', Y');
            $sales = OrderProduct::latest()->whereYear('created_at', '=', date('Y'))
                                    ->where('isCheckout', true)->get();
        }
        elseif($filter == 'all'){
            $title_filter  = 'ALL RECORDS';
            $sales = OrderProduct::latest()->where('isCheckout', true)->get();
        }else{
            $title_filter  = 'From: ' . date('F d, Y') . ' To: ' . date('F d, Y');
            $sales = OrderProduct::latest()->whereDate('created_at', Carbon::today())
                                    ->where('isCheckout', true)->get();
        }

        return view('admin.sales_reports.sales_reports', compact('sales','title_filter'));
       
    }

    public function summary_of_transaction(){
        $products    = Product::latest()->get();

        foreach($products as $product){
    

            $sold = OrderProduct::where('product_id', $product->id)->where('isCheckout', true)->sum('qty');
            $amount = OrderProduct::where('product_id', $product->id)->where('isCheckout', true)->sum('amount');
            
            $sales[] = array(
                'product'              => $product->name,
                'sold'             => $sold,
                'amount'            => $amount,  
            );
        }

        $total_amount = OrderProduct::where('isCheckout', true)->sum('amount');
        $total_sold = OrderProduct::where('isCheckout', true)->sum('qty');

        return response()->json([
            'data' => $sales,
            'total_amount' => $total_amount,
            'total_sold' => $total_sold,
            'bot_product' => '-',
        ]);
    }

    public function uploaded_transaction()
    {
       $transactions =  UploadedTransaction::latest()->get();
        return view('admin.sales_reports.uploaded_transaction', compact('transactions'));
    }


    public function uploaded_transaction_store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
          
            'file_upload' =>  ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $imgs = $request->file('file_upload');
        $extension = $imgs->getClientOriginalExtension(); 
        $file_name_to_save = time()."_".".".$extension;
        $imgs->move('assets/file/', $file_name_to_save);

        UploadedTransaction::create([
            'user_id' => Auth()->user()->id,
            'file' => $file_name_to_save,
        ]);


        return response()->json(['success' => 'Added Successfully.']);
    }
    
    
}
