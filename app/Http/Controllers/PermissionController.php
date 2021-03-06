<?php

namespace App\Http\Controllers;

use App\Model\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function index(){
        $permissions = Permission::all();
        return view('permissions.index', ['permissions'=>$permissions]);
    }
    public function add(){
        return view('permissions.add');
    }
    public function create() {
        return 'hello';
    }

}
