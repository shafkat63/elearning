<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class ProgramController extends Controller
{
    public function index(){
        $permission = Permission::get();
        return view('role-permission.permission.index',['permission'=>$permission]);
    }
}
