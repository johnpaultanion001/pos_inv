<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class LandingpageController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('welcome' ,compact('products'));
    }
    public function view(Product $product)
    {
        if (request()->ajax()) {
            return response()->json(['result' =>  $product]);
        }
    }

}
