<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Raw;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use File;

class RawController extends Controller
{
    
    public function index()
    {
         date_default_timezone_set('Asia/Manila');
            $raws = Raw::latest()->get();

            return view('admin.raws', compact('raws'));
        
    }

   
    

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Raw::create([
            'name' => $request->input('name'),
            'kilo' => $request->input('kilo'),
            'supplier' => $request->input('supplier'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ]);

        return response()->json(['success' => 'Added Successfully.']);
    }

    public function edit(Raw $raw_inventory)
    {
        if (request()->ajax()) {
            return response()->json(
                ['data' =>  $raw_inventory]
            );
        }
    }

    
    public function update(Request $request, Raw $raw_inventory)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $raw_inventory->update([
            'name' => $request->input('name'),
            'kilo' => $request->input('kilo'),
            'supplier' => $request->input('supplier'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

   
    public function destroy(Raw $raw)
    {
        $raw_inventory->delete();
        return response()->json(['success' =>  'Removed Successfully.']);
    }
}
