<?php
namespace App\Traits;


use App\Model\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait CommonTrait {

    public function getAllPermissions(){
        $permission = Permission::get();
        return $permission;
    }

    // public function getpermissionItems(){
    //     $data = Permission::get();
    //     return $data;
    // }
}
