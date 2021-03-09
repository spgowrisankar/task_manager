<?php

namespace App\Http\Controllers;

use App\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    //
    public function index(){
        $roles = Role::all();
        return view('roles.index',['roles'=>$roles]);
    }
    public function add(){
        return view('roles.add');
    }

    public function create(Request $request) {
        if ($request) {
            Role::create([
                'name' => $request['name'],
                'short_code' => $request['short_code'],
                'is_active' => $request['status'],
            ]);
            {
                return back()->with(['success'=>'Role Created Successfully'])->withInput();
            }
        }
    }
    public function edit(Request $request){
        $id = $request->get('id');
        $role = Role::find($id);
        return view('roles.edit',compact('role'));
    }

    public function update(Request $request, $id) {
        $request->validate([
           'name' =>'required',
           'short_code' =>'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->get('name');
        $role->short_code = $request->get('short_code');
        $role->is_active = $request->get('status');
        $role->save();

        return redirect('admin/role/manage')->with('success','Role Updated');
    }

    public function delete(Request $request) {
        if ($request->get('id')) {
            $id = $request->get('id');
            if (Role::where('id',$id)->delete()){
                return Redirect::to('admin/role/manage')->with(['success'=>'Role deleted Successfully']);
            }

        }
    }
}
