<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    

    public function create(Request $request){
        $req = $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'ConfirmPassword' => 'required|same:password',
        ];
        $customMessages = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'phone.required' => 'Phone is required.',
            'password.required' => 'Password is required.',
            'ConfirmPassword.required' => 'Confirm Password is required.',
            'ConfirmPassword.same' => 'The confirmation password must match the new password.',
        ];

        $validator = Validator::make($req,$rules);
        $validator->setCustomMessages($customMessages);
        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'data' => $validator->errors(),
            ]);
        }
        if($request->id==""){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();
            $roleIds = [5];
            $user->syncRoles($roleIds);
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => 'Registration Complected Successfully',
                'routeUrl' => url('login'),
            ]);
        }
    }
}
