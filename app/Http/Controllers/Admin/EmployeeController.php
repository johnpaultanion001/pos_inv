<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Validator;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('admin.employee', compact('employees'));
        
    }

    public function store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required'],
            'address' => ['required'],
            'gender' => ['required'],
            'branch'    =>  ['required'],
            'position' => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Employee::create([
            'name' => $request->input('name'),
            'contact_number' => $request->input('contact_number'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'position' => $request->input('position'),
            'branch' => $request->input('branch'),
        ]);

        return response()->json(['success' => 'Added Successfully.']);
    }

  
    public function show(Employee $employee)
    {
        //
    }

    public function edit(Employee $employee)
    {
        if (request()->ajax()) {
            return response()->json(
                ['result' =>  $employee]
            );
        }
    }

  
    public function update(Request $request, Employee $employee)
    {
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required'],
            'address' => ['required'],
            'gender' => ['required'],
            'position' => ['required'],
            'branch'    =>  ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $employee->update([
            'name' => $request->input('name'),
            'contact_number' => $request->input('contact_number'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'position' => $request->input('position'),
            'branch' => $request->input('branch'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

  
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['success' =>  'Removed Successfully.']);
    }
}
