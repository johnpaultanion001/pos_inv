<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    
    public function index()
    {
        $products = Product::latest()->get();
        return view('welcome' ,compact('products'));
    }
       
   
    
}
