<?php

namespace App\Http\Controllers;

use App\Model\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller
{
    //
    public function index(){
        $permissions = Permission::all();
        return view('permissions.index', ['permissions'=>$permissions]);
    }

    public function create(){
        return view('permissions.add');
    }

    public function store(Request $request) {
        if ($request) {
            Permission::create([
                'name' => strtoupper($request['name']),
                'short_code' => strtolower(str_replace(" ", "_", $request['name'])),
            ]);
            {
                return back()->with(['success'=>'Permission has been created Successfully'])->withInput();
            }
        }
    }

    public function edit(Request $request){
        $id = $request->get('id');
        $permission = Permission::find($id);
        return view('permissions.edit',compact('permission'));
    }
    public function update(Request $request, $id) {

        $request->validate([
            'name' =>'required',
            'short_code' =>'required',
        ]);
        $permission = Permission::find($id);
        $permission->name = $request->get('name');
        $permission->short_code = strtolower(str_replace(" ", "_", $request['name']));
        $permission->save();

        return Redirect::route('admin/manage_permissions')->with(['success'=>'Permission has been updated successfully.']);
    }

    public function delete(Request $request) {
        if ($request->get('id')) {
            $id = $request->get('id');
            if (Permission::where('id',$id)->delete()){
                return Redirect::to('admin/manage_permissions')->with(['success'=>'Permission has been  deleted successfully.']);
            }

        }
    }

}
