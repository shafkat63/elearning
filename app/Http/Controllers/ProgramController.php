<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(){
        $permission = Permission::get();
        return view('role-permission.permission.index',['permission'=>$permission]);
    }
}
