<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function updateshow()
    {
        return view('patient.update_info');

    }
    public function update(Request $request , User $user)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date' , 'before:today'],
            'contact_number' => ['required', 'string', 'min:8','max:11'],
            'civil_status' => ['required'],
            'gender' => ['required'],
            'address' => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        $dob = $request->input('birth_date');
        $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
        User::find($user->id)->update([
            'name' => $request->input('name'),
            'birth_date' => $request->input('birth_date'),
            'contact_number' => $request->input('contact_number'),
            'civil_status' => $request->input('civil_status'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'age'      => $age,
            'isRegistered' => true,
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function changepassword(Request $request , User $user)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'current_password' => ['required',new MatchOldPassword],
            'new_password' => ['required'],
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
}
