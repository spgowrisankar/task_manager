<?php
namespace App\Traits;


use App\Model\Role;
use App\User;

trait UserTrait{
     public function listUser() {
         $users = User::leftJoin('roles', 'users.roles', '=', 'roles.id')
             ->select( 'users.*','roles.name as role_name')
             ->get();
         return $users;
     }

     public function listRole(){
         $roles = Role::pluck('name','id')->toArray();
         $roles[0] = 'Select role... ';
         ksort($roles);
         return $roles;
     }
}
