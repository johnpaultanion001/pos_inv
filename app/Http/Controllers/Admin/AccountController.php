<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Validator;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
  
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'manager'){

            $accounts = User::latest()->get();
            $employees = Employee::latest()->get();

            return view('admin.accounts', compact('accounts','employees'));
        }
        return abort('403');
    }

  
   
    public function store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $user = User::where('employee_id',$request->input('employee_id'))->first();
        if($user != null){
            return response()->json(['already_account' => 'This employee is already created account.']);
        }
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        User::create([
            'employee_id'   => $request->input('employee_id'),
            'email'         => $request->input('email'),
            'password'      => Hash::make($request->input('password')),
            'role'         => $request->input('role'),
        ]);

        return response()->json(['success' => 'Added Successfully.']);

    }

    public function show($id)
    {
        //
    }

   
    public function edit(User $account)
    {
        if (request()->ajax()) {
            return response()->json(
                ['result' =>  $account]
            );
        }
    }

    
    public function update(Request $request, User $account)
    {
        $validated =  Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users,email,'.$account->id],
            'employee_id' => ['required', 'unique:users,employee_id,'.$account->id],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $account->update([
            'employee_id'   => $request->input('employee_id'),
            'email'         => $request->input('email'),
            'password'      => Hash::make($request->input('password')),
            'role'         => $request->input('role'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }
    
    public function destroy(User $account)
    {
        $account->delete();
        return response()->json(['success' =>  'Removed Successfully.']);
    }
}
