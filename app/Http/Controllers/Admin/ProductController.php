<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use File;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            date_default_timezone_set('Asia/Manila');
            
            $products = Product::latest()->get();
            return view('admin.products', compact('products'));
        }
        return abort('403');
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'stock' => ['required' ,'integer','min:1'],
            'price' => ['required' ,'numeric','min:1'],
            'image' =>  ['required' , 'mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $imgs = $request->file('image');
        $extension = $imgs->getClientOriginalExtension(); 
        $file_name_to_save = time()."_".".".$extension;
        $imgs->move('assets/img/products/', $file_name_to_save);

        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'image' => $file_name_to_save,
        ]);

        return response()->json(['success' => 'Product Added Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (request()->ajax()) {
            return response()->json(['result' =>  $product]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateproduct(Request $request, Product $product)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'stock' => ['required' ,'integer','min:1'],
            'price' => ['required' ,'numeric','min:1'],
            'image' =>  ['mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        if ($request->file('image')) {
            File::delete(public_path('assets/img/products/'.$product->image));
            $imgs = $request->file('image');
            $extension = $imgs->getClientOriginalExtension(); 
            $file_name_to_save = time()."_".".".$extension;
            $imgs->move('assets/img/products/', $file_name_to_save);

            $product->image = $file_name_to_save;
        }
       
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return response()->json(['success' => 'Product Updated Successfully.']);
    }
    public function addedstock(Request $request, Product $product){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
           'added_stock' => ['required' ,'integer','min:1'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        Product::where('id',$product->id)->increment('stock',  $request->added_stock);
        return response()->json(['success' => 'Product Updated Successfully.']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        File::delete(public_path('assets/img/products/'.$product->image));
        $product->delete();
        return response()->json(['success' =>  'Product Removed Successfully.']);
    }
}
