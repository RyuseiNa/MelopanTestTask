<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth::superadmin');
    }
    public function edit(Request $request){

    }
    public function remove(Admin $admin,$permissionID){

    }
    public function add(Admin $admin,$permissionID){

    }
    public function index(){

    }

}
