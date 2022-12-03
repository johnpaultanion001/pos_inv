<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\Models\Product;
use App\Models\Category;
use Validator;

class HomeController extends Controller
{
    
    public function account(){
        return view('customer.account');
    }

    public function passwordupdate(Request $request , User $user){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'current_password' => ['required',new MatchOldPassword],
            'new_password' => ['required','min:8'],
            'confirm_password' => ['required','same:new_password'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::find($user->id)->update([
            'password' => Hash::make($request->input('new_password')),
          
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function account_update(Request $request){
       
        $validated =  Validator::make($request->all(), [
            'name'   => ['required'],
            'contact_number' => ['required', 'string', 'min:8','max:11','unique:users,contact_number,'.auth()->user()->id],
            'address'   => ['required'],
            'email' => ['required', 'email','unique:users,email,'.auth()->user()->id],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $user = User::find(auth()->user()->id)->update(
            [
                'email'  => $request->input('email'),
                'name'  => $request->input('name'),
                'contact_number'  => $request->input('contact_number'),
                'address'  => $request->input('address'),
            ]
        );
   
        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function index()
    {
        $categories = Category::latest()->get();
        $products = Product::latest()->get();
        return view('customer.home' , compact('products','categories'));
    }


    public function filter(Request $request){
        $filter = $request->get('filter');
        $value  = $request->get('value');

        if($filter == 'search'){
            $data = Product::where('name', 'LIKE', "%$value%")->latest()->get();
        }

        if($filter == 'category'){
            if($value == ''){
                $data = Product::latest()->get();
            }else{
                $data = Product::where('category_id', $value)->latest()->get();
            }
        }
        
        foreach($data as $item){
          
            $products[] = array(
                'id'           => $item->id,
                'name'         => $item->name ?? '',
                'category'     => $item->category->name ?? '',
                'image'        => $item->image,
            );
        }
        return response()->json([
            'products'  => $products,
        ]);
    }

}
