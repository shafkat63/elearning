<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleConfroller extends Controller
{

    public function __construct(){
        $this->middleware('permission:delete-role',['only'=>['destroy']]);
        $this->middleware('permission:update-role',['only'=>['edit']]);
        $this->middleware('permission:create-role',['only'=>['create']]);
        $this->middleware('permission:view-role',['only'=>['index']]);

    }

    public function index(){
        $role = Role::get();
        return view('role-permission.role.index',['role'=>$role]);
    }

    public function create(){
        return view('role-permission.role.create');
    }

    public function edit(Role $role){
       // return $role;
        return view('role-permission.role.edit',['role'=>$role]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required','string','unique:roles,name']
        ]);
        $role = Role::create(['name' => $request->name]);
        $fasdfsa = $request->name;
        return redirect('roles')->with('status','Role Added Successfully');
    }

    public function show(){

    }

    public function update(Request $request,Role $role){
        $request->validate([
            'name' => ['required','string','unique:roles,name,'.$role->id]
        ]);
        $role->update(['name' => $request->name]);
        return redirect('roles')->with('status','Role Update Successfully');
    }

    public function destroy($id){
        $role = Role::find($id);
        $role->delete();
        return redirect('roles')->with('status','Role Deleted Successfully');
    }

    public function givePermission($id){

        $permission = Permission::all();
        $role =  Role::findOrFail($id);
        $rolePermission = DB::table('role_has_permissions')
        ->where('role_has_permissions.role_id',$role->id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        return view('role-permission.role.add-permission',['role'=>$role,'permission'=>$permission,'rolePermission'=>$rolePermission]);
    }

    public function savePermission(Request $request,$id){

        $request->validate([
            'permission' => ['required']
        ]);
        $role =  Role::findOrFail($id);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('status','Permission Added Successfully To Role');
    }
}
