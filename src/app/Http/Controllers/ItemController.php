<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Admin;
use App\Models\Item;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        // return $items->toArray();
        return view('item.list',compact('items'));
    }
    public function showRegister(){
        return view('item.create');
    }
    public function store(Request $request)
    {
        $result = "success";
        try {
        $id = Auth::guard("admin")->id();
        $uuid = (string) Str::uuid();
        //アップロードされた画像処理
        $imagepath = $request->file('file')->store('public/item/');
        $imagename = $request->file('file')->getClientOriginalName();
        $imagepath = basename($imagepath);
        Item::create([
            'admin_id' =>$id,
            'uuid' => $uuid,
            'name' => $request->name,
            'SKU' => $request->SKU,
            'description' => $request->description,
            'imagepath' => $imagepath,
            'imagename' => $imagename,
        ]);
        } catch (\Exception $e) {
            $result = "Error.Try again later.";
        }
        return view('result',compact('result'));
    }
    public function show(Request $request,$UUID)
    {
        $item = Item::where('uuid', '=', $UUID)->first();
        // $item->toArray();
        $owner = Admin::find($item->admin_id)->name;
        return view('item.detail',compact('item','owner'));
    }
    public function showUpdate($UUID){
        $item = Item::where('uuid', '=', $UUID)->first();
        return view('item.edit',compact('item'));
    }
    public function update(Request $request,$UUID)
    {
        $result = "success";
        try{
            if(empty($request->file())){
                Item::where('uuid','=',$UUID)->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'SKU' => $request->SKU
                ]);
            }else{
                Storage::delete("storage/item/".Item::where('uuid','=',$UUID)->first()->imagepath);
                $imagepath = $request->file('file')->store('public/item/');
                $imagename = $request->file('file')->getClientOriginalName();
                Item::where('uuid','=',$request->uuid)->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'SKU' => $request->SKU,
                    'imagepath' => $imagepath,
                    'imagename' => $imagename,
                ]);
            }
        } catch (\Exception $e) {
            $result = "Error.Try again later.";
        }
        return view('result',compact('result'));
    }
    public function showDelete($UUID){
        $item = Item::where('uuid', '=', $UUID)->first();
        $owner = Admin::find($item->admin_id)->name;

        return view('item.delete',compact('item','owner','UUID'));
    }
    public function delete(Request $request)
    {
        $result = "deleted";
        $item = Item::where("SKU","=","$request->SKU")->first();
        if(Auth::guard("admin")->id()==$item->admin_id){
            $item->delete();
        }else{
            $result =  "you are not item owner.";
        }
        return view('result',compact('result'));
    }
}
