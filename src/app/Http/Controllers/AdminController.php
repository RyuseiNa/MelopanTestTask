<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        $admins = Admin::all();
        return view('admin.list',compact('admins'));
    }
    public function show(Admin $admin)
    {

    }
    public function showUpdate($UUID){
        $admin = Admin::where('uuid','=',$UUID)->first();
        $permissions = $admin->permissions;
        $crud = array();
        foreach ($permissions as $permission) {
            $crud[] = $permission->id;
        }
        return view('admin.edit',compact('admin','crud'));
    }
    public function update(Request $request,$UUID)
    {
        $result = "success";
        $admin = Admin::where('uuid','=',$UUID)->first();
        if(!is_null($request->create)){
            $admin->permissions()->syncWithoutDetaching(1);
        }else{
            $admin->permissions()->detach(1);
        }
        if(!is_null($request->read)){
            $admin->permissions()->syncWithoutDetaching(2);
        }else{
            $admin->permissions()->detach(2);
        }
        if(!is_null($request->update)){
            $admin->permissions()->syncWithoutDetaching(3);
        }else{
            $admin->permissions()->detach(3);
        }
        if(!is_null($request->delete)){
            $admin->permissions()->syncWithoutDetaching(4);
        }else{
            $admin->permissions()->detach(4);
        }
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'uuid' => $request->uuid,
        ]);
        return view('result',compact('result'));

    }
    public function showDelete($UUID){
        $admin = Admin::where('uuid','=',$UUID)->first();
        return view('admin.delete',compact('admin'));
    }
    public function delete(Request $request)
    {
        $result = "deleted";
        $item = Admin::where("UUID","=","$request->uuid")->first();
        $item->delete();
        return view('result',compact('result'));
    }

    public function selfEdit(Admin $admin)
    {

    }
    public function selfDestroy(Admin $admin)
    {

    }
}
