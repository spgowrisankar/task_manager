<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'name', 'short_code', 'is_active',
    ];
    public function users() {
        return $this->hasMany(User::class,'roles','id');
    }

    public function  permissions(){
        return $this->hasMany(Permission::class,'roles_permissions');
    }
}
