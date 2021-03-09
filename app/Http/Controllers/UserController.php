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
    public function add(){
        $roles = $this->listRole();
        return view('users.add',['roles'=>$roles]);
    }
    public function create(Request $request) {
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
        $id = $request->get('id');
        $users = User::find($id);
        $roles = $this->listRole();
        $param = ['users', 'roles'];

        return view('users.edit',compact($param));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'name' =>'required',
            'roles'=> 'required'
        ]);
        $users = User::find($id);
        $users->name = $request->get('name');
        $users->roles = $request->get('roles');
        $users->save();

        return redirect('user/manage')->with('success','User has been Updated successfully!');
    }

    public function delete(Request $request) {
        if ($request->get('id')) {
            $id = $request->get('id');
            if (User::where('id',$id)->delete()){
                return Redirect::to('user/manage')->with(['success'=>'User deleted Successfully']);
            }

        }
    }


}
