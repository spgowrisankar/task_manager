<?php

namespace App\Http\Controllers;

use App\Model\Role;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Fqsen;
use Illuminate\Support\Facades\Auth;


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
        // dd($request);
        if ($request) {
            $role = new Role();
            $role->name = $request->name;
            $role->short_code = strtolower(str_replace(" ", "_", $request['name']));
            $role->save();
            $permissions = $request->permissions;

            foreach($permissions as $key => $values) {
                if ($key > 0){
                    $role->permissions()->attach($key,$values);
                }
            }
            {
                return back()->with(['success'=>'Role has been created successfully'])->withInput();
            }
        }
    }

    public function edit(Request $request){
        if ($request) {
            $id = $request->get('id');
            $role = Role::find($id);
            $permissions = $this->getAllPermissions();
            $permissionitems = DB::table('roles_permissions')->where('role_id',$id)->get();
            $param = ['role', 'permissions','permissionitems'];
            return view('roles.edit', compact($param));
        }
    }

    public function update(Request $request, $id) {
        if ($request) {
            $request->validate([
                'name' => 'required',
                'short_code' => 'required',
            ]);
            $role = Role::find($id);
            $role->name = $request->get('name');
            $role->short_code = strtolower(str_replace(" ", "_", $request['name']));
            $role->save();
            if ($request->permissions != null){
                $role->permissions()->detach();

                $permissions = $request->permissions;

                foreach($permissions as $key => $values) {
                    if ($key > 0){
                        $role->permissions()->attach($key,$values);
                    }
                }
            }
            return redirect('admin/manage_roles')->with('success', 'Role has been updated successfully');
        }
    }

    public function delete(Request $request) {
        if ($request->get('id')) {
            $id = $request->get('id');
            if (Role::where('id',$id)->delete() ){
                return Redirect::to('admin/manage_roles')->with(['success'=>'Role has been deleted successfully']);
            }
        }
    }
    public function list(){
        $data = Auth::user()->pluck('roles');
        return $data;
    }
}
