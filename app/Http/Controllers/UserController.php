<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:user-update', ['only' => ['edit']]);
        $this->middleware('permission:user-create', ['only' => ['create']]);
        $this->middleware('permission:user-view', ['only' => ['index']]);
    }
    public function index()
    {
        $permission = Permission::get();
        return view('role-permission.user.index', ['permission' => $permission]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('role-permission.user.create', ['roles' => $roles]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        //return (['user'=>$user,'roles'=>$roles,'userRoles'=>$userRoles]);
        return view('role-permission.user.edit', ['user' => $user, 'roles' => $roles, 'userRoles' => $userRoles]);
    }


    public function store(Request $request)
    {
        $req = $request->all();

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
            'roles' => 'required',
            'userType' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add validation rules for the avatar
        ];
        $customMessages = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'phone.required' => 'Phone is required.',
            'password.required' => 'Password is required.',
            'roles.required' => 'Roles is required.',
            'userType.required' => 'UserType is required.',
            'avatar.image' => 'The file must be an image.',
            'avatar.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'avatar.max' => 'The image may not be greater than 2048 kilobytes.',
        ];

        $validator = Validator::make($req, $rules);
        $validator->setCustomMessages($customMessages);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'data' => $validator->errors(),
            ]);
        }

        if ($request->id == "") {

            $user = new User();
        } else {
            $user = User::find($request->id);
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'data' => 'User not found.',
                ]);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->usertype = $request->userType;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('userPicture', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();
        $user->syncRoles($request->roles);

        $message = $request->id == "" ? $request->name . ' Added Successfully' : $request->name . ' Updated Successfully';

        return response()->json([
            'code' => '200',
            'status' => 'Success',
            'msg' => $message,
            'routeUrl' => url('User'),
        ]);
    }


    public function destroy($id)
    {
        try {
            $permission = User::find($id);
            $permission->delete();
            return json_encode(array(
                "statusCode" => 200
            ));
        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function getAllUsers()
    {
        $query =  DB::table('users as p')
            ->select('p.id', 'p.name', 'p.email', 'p.phone')
            ->get();
        return User::with('roles')->get();

        $user =  User::get();
        return $roles = $user->getRoleNames();
    }

    public function getAllUser(Request $request)
    {
        $query = User::with('roles')->select('id', 'name', 'email', 'phone');
        $totalCount = $query->count();

        if ($request->has('search.value')) {
            $query->where('name', 'like', '%' . $request->input('search.value') . '%');
        }

        $filteredCount = $query->count();

        if ($request->has('order')) {
            $orderColumnIndex = $request->input('order.0.column');
            $orderColumnName = $request->input('columns.' . $orderColumnIndex . '.data');
            $orderDirection = $request->input('order.0.dir');

            $query->orderBy($orderColumnName, $orderDirection);
        }

        // Apply pagination
        $query->skip($request->input('start', 0))
            ->take($request->input('length', 10));

        // Fetch data
        $data = $query->get();
        $formattedData = [];
        foreach ($data as $user) {
            $roles = $user->roles->pluck('name')->implode(', ');

            $formattedRoles = '<ul>';
            foreach ($user->roles as $role) {
                $formattedRoles .= '<li class="badge badge-outline-success badge-pill">' . $role->name . '</li>';
            }
            $formattedRoles .= '</ul>';
            $formattedData[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'roles' => $formattedRoles,
            ];
        }
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $filteredCount,
            'data' => $formattedData,
        ]);
    }

    public function showProfile()
    {
        return view('role-permission.user.profile');
    }

    public function showChangePass()
    {
        return view('role-permission.user.changepass');
    }

    // public function ChangePass(Request $request){

    //     $req = $request->all();
    //     $rules = [
    //         'email' => 'required',
    //         'OldPassword' => 'required',
    //         'NewPassword' => 'required',
    //         'ConfirmPassword' => 'required|same:NewPassword',
    //     ];

    //     $customMessages = [
    //         'email.required' => 'Email is required.',
    //         'OldPassword.required' => 'Old Password is required.',
    //         'NewPassword.required' => 'New Password is required.',
    //         'ConfirmPassword.required' => 'Confirm Password is required.',
    //         'ConfirmPassword.same' => 'The confirmation password must match the new password.',
    //     ];

    //     $validator = Validator::make($req,$rules);
    //     $validator->setCustomMessages($customMessages);
    //     if ($validator->fails()){
    //         return response()->json([
    //             'status' => 'error',
    //             'data' => $validator->errors(),
    //         ]);
    //     }

    //     $hashedPassword = Auth::user()->password;
    //     $userInputPassword = $request->OldPassword;

    //     if (Hash::check($userInputPassword, $hashedPassword)) {

    //         $user = Auth::user();
    //         dd($user);
    //         $user->password = Hash::make($request->new_password);

    //         $user->save();
    //         Auth::logout();
    //         $request->session()->invalidate();
    //         $request->session()->regenerateToken();
    //         return response()->json([
    //             'code' => '200',
    //             'status'=> 'Success',
    //             'msg' => 'Password changed successfully',
    //             'routeUrl' => '/'
    //         ]);
    //     } else {
    //         return response()->json([
    //             'code' => '201',
    //             'status'=> 'Failed',
    //             'msg' => 'Password changed Failed',
    //         ]);
    //     }
    // }

    public function ChangePass(Request $request)
    {
        $req = $request->all();
        $rules = [
            'email' => 'required',
            'OldPassword' => 'required',
            'NewPassword' => 'required',
            'ConfirmPassword' => 'required|same:NewPassword',
        ];

        $customMessages = [
            'email.required' => 'Email is required.',
            'OldPassword.required' => 'Old Password is required.',
            'NewPassword.required' => 'New Password is required.',
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

        $hashedPassword = Auth::user()->password;
        $userInputPassword = $request->OldPassword;

        if (Hash::check($userInputPassword, $hashedPassword)) {
            $user = Auth::user();
            $user->password = Hash::make($request->NewPassword);
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
        } else {
            return response()->json([
                'code' => '201',
                'status' => 'Failed',
                'msg' => 'Password change failed',
            ]);
        }
    }


    public function authenticate(Request $request)
    {
        try {

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                $hasStudentRoles = $user->hasAnyRole(['Student Free', 'Student Silver', 'Student Platinum', 'Student Gold']);

                if ($hasStudentRoles) {
                    return json_encode(array(
                        'statusCode' => 200,
                        'route' => 'Home',
                    ));
                } else {
                    return json_encode(array(
                        'statusCode' => 200,
                        'route' => 'Dashboard',
                    ));
                }
            } else {
                return json_encode(array(
                    "statusCode" => 201
                ));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return json_encode(array(
                "statusCode" => 201,
                "statusMsg" => $e->getMessage()
            ));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
