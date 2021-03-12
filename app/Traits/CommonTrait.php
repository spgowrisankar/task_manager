<?php
namespace App\Traits;


use App\Model\Permission;

trait CommonTrait {

    public function getAllPermissions(){
        $permission = Permission::pluck('short_code','id');
        return $permission;
    }
}
