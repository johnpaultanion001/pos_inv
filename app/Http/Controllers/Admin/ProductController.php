<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSizePrice;
use App\Models\Category;
use App\Models\Size;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use File;



class ProductController extends Controller
{
 
    public function index()
    {
        
            $products = Product::latest()->get();
            $categories = Category::latest()->get();
            $sizes = Size::latest()->get();

            return view('admin.products', compact('products', 'categories', 'sizes'));
       
    }
   
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required'],
            'image' =>  ['required' , 'mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $imgs = $request->file('image');
        $extension = $imgs->getClientOriginalExtension(); 
        $file_name_to_save = time()."_".".".$extension;
        $imgs->move('assets/img/products/', $file_name_to_save);

        $product = Product::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category'),
            'description' => $request->input('description'),
            'image' => $file_name_to_save,
        ]);

        foreach($request->input('size') as $key => $size )
        {
            ProductSizePrice::updateOrCreate(
                [
                    'product_id'                => $product->id,
                    'size_id'                   => $size,
                ],
                [
                    'product_id'                => $product->id,
                    'size_id'                   => $size,
                    'price'                     => $request->price[$key],
                    'stock'                     => $request->stock[$key],
                ]
            );
        }

        return response()->json(['success' => 'Product Added Successfully.']);
    }

   
    public function edit(Product $product)
    {
        foreach($product->products_sizes_prices()->get() as $psp){
            $sps[] = array(
                'size'         => $psp->size->id,
                'size_name'         => $psp->size->name,
                'price'        => $psp->price,
                'stock'        => $psp->stock, 
                'sizes'        => $sizes = Size::latest()->get(),
            );
        }

        return response()->json([
            'result' =>   $product,
            'sps'    => $sps,
        ]);
    }

    public function updateproduct(Request $request, Product $product)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required'],
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
       
        ProductSizePrice::where('product_id', $product->id)
                            ->whereNotIn('size_id', $request->input('size'))
                            ->delete();
                            
        foreach($request->input('size') as $key => $size )
        {
            ProductSizePrice::updateOrCreate(
                [
                    'product_id'                => $product->id,
                    'size_id'                   => $size,
                ],
                [
                    'product_id'                => $product->id,
                    'size_id'                   => $size,
                    'price'                     => $request->price[$key],
                    'stock'                     => $request->stock[$key],
                ]
            );
        }
        

        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->description = $request->description;
  
        $product->save();

        return response()->json(['success' => 'Product Updated Successfully.']);
    }
  
  
    public function destroy(Product $product)
    {
        File::delete(public_path('assets/img/products/'.$product->image));
        $product->delete();
        return response()->json(['success' =>  'Product Removed Successfully.']);
    }
}
