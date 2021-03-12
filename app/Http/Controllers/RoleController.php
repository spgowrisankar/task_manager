<?php

namespace App\Http\Controllers;

use App\Model\Role;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Fqsen;

class RoleController extends Controller
{
    //
    use CommonTrait;

    public function index(){
        $roles = Role::all();
        return view('roles.index',['roles'=>$roles]);
    }
    public function create(){
        $permissions = $this->getAllPermissions();
        return view('roles.add',['permissions'=>$permissions]);
    }

    public function store(Request $request) {
        if ($request) {
            $role = new Role();
            $role->name = $request->name;
            $role->short_code = $request->short_code;
            $role->save();

            $role->permissions()->attach($request->permission);
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
            if (Role::where('id',$id)->delete() ){
                return Redirect::to('admin/role/manage')->with(['success'=>'Role deleted Successfully']);
            }
        }
    }
}
