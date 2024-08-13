<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
   public function changePassword(){
            
   }
   public function showChangePass(){
        return view('student.user.changePassword');
   }
   public function editProfile(){
    return 'Under Construction';
   }



//    public function ChangePass(Request $request)
//    {
//        $req = $request->all();
//        $rules = [
//            'email' => 'required',
//            'OldPassword' => 'required',
//            'NewPassword' => 'required',
//            'ConfirmPassword' => 'required|same:NewPassword',
//        ];

//        $customMessages = [
//            'email.required' => 'Email is required.',
//            'OldPassword.required' => 'Old Password is required.',
//            'NewPassword.required' => 'New Password is required.',
//            'ConfirmPassword.required' => 'Confirm Password is required.',
//            'ConfirmPassword.same' => 'The confirmation password must match the new password.',
//        ];

//        $validator = Validator::make($req, $rules, $customMessages);
//        if ($validator->fails()) {
//            return response()->json([
//                'status' => 'error',
//                'data' => $validator->errors(),
//            ]);
//        }

//        $hashedPassword = Auth::user()->password;
//        $userInputPassword = $request->OldPassword;

//        if (Hash::check($userInputPassword, $hashedPassword)) {
//            $user = Auth::user();
//            $user->password = Hash::make($request->NewPassword);
//            $user->save();
//            Auth::logout();
//            $request->session()->invalidate();
//            $request->session()->regenerateToken();
//            return response()->json([
//                'code' => '200',
//                'status' => 'Success',
//                'msg' => 'Password changed successfully',
//                'routeUrl' => '/'
//            ]);
//        } else {
//            return response()->json([
//                'code' => '201',
//                'status' => 'Failed',
//                'msg' => 'Password change failed',
//            ]);
//        }
//    }

public function ChangePass(Request $request)
{
    if (!Auth::check()) {
        return response()->json([
            'code' => '401',
            'status' => 'Unauthorized',
            'msg' => 'User not authenticated.',
        ]);
    }
    
    $req = $request->all();
    $rules = [
        'email' => 'required|email',
        'OldPassword' => 'required',
        'NewPassword' => 'required|min:8',
        'ConfirmPassword' => 'required|same:NewPassword',
    ];

    $customMessages = [
        'email.required' => 'Email is required.',
        'OldPassword.required' => 'Old Password is required.',
        'NewPassword.required' => 'New Password is required.',
        'NewPassword.min' => 'New Password must be at least 8 characters.',
        'ConfirmPassword.required' => 'Confirm Password is required.',
        'ConfirmPassword.same' => 'The confirmation password must match the new password.',
    ];

    $validator = Validator::make($req, $rules, $customMessages);
    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'data' => $validator->errors(),
        ]);
    }

    if (!Auth::check()) {
        return response()->json([
            'code' => '401',
            'status' => 'Unauthorized',
            'msg' => 'User not authenticated.',
        ]);
    }

    $hashedPassword = Auth::user()->password;
    $userInputPassword = $request->OldPassword;

    if (Hash::check($userInputPassword, $hashedPassword)) {
        $user = Auth::user();
        $user->password = Hash::make($request->NewPassword);

        try {
            $user->save();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => 'Password changed successfully',
                'routeUrl' => '/'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => '500',
                'status' => 'Error',
                'msg' => 'An error occurred while changing the password: ' . $e->getMessage(),
            ]);
        }
    } else {
        return response()->json([
            'code' => '201',
            'status' => 'Failed',
            'msg' => 'Old password is incorrect.',
        ]);
    }
}




public function edit($id)
{
    $user = User::find($id);
    // $roles = Role::pluck('name', 'name')->all();
    // $userRoles = $user->roles->pluck('name', 'name')->all();
    //return (['user'=>$user,'roles'=>$roles,'userRoles'=>$userRoles]);
    return view('student.user.editProfile', ['user' => $user]);
}

public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'password' => 'nullable|string|min:8',
    ]);

    $data = $request->all();

    $user = auth()->user();

    $user->name = $data['name'];
    $user->phone = $data['phone'];

    // Update the user's password if provided
    if (!empty($data['password'])) {
        $user->password = bcrypt($data['password']);
    }

    // Save the updated user data
    $user->save();

    // Return a success response
    return response()->json([
        'code' => '200',
        'status' => 'Success',
        'msg' => 'Profile updated successfully',
        // 'routeUrl' => route('Home')
        'routeUrl' => url('Home'),

    ]);
}



}
