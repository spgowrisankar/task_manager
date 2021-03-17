<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    use UserTrait;

    public function index(){
       $users = $this->listUser();
       return view('users.index',['users'=>$users]);
    }
    public function create(){
        $roles = $this->listRole();
        return view('users.add',['roles'=>$roles]);
    }
    public function store(Request $request) {
        if ($request) {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'roles' => $request['roles'],
            ]);
            {
                return back()->with(['success'=>'User has been Created Successfully'])->withInput();
            }
        }
    }
    public function edit(Request $request){
        $uuid = $request->get('uuid');
        $users = User::where('uuid', $uuid)->first();
        $roles = $this->listRole();
        $param = ['users', 'roles'];

        return view('users.edit',compact($param));
    }
    public function update(Request $request, $uuid) {
        $request->validate([
            'name' =>'required',
            'roles'=> 'required'
        ]);

        $users = User::where('uuid', $uuid)->first();
        $users->name = $request->get('name');
        $users->roles = $request->get('roles');
        $users->save();

        return redirect('admin/manage_users')->with('success','User has been Updated successfully!');
    }

    public function delete(Request $request) {
        if ($request->get('uuid')) {
            $uuid = $request->get('uuid');
            if (User::where('uuid',$uuid)->delete()){
                return Redirect::to('admin/manage_users')->with(['success'=>'User deleted Successfully']);
            }

        }
    }


}
