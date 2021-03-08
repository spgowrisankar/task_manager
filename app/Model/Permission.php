<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable = [
        'name', 'short_code', 'is_active',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'roles_permissions');
    }
}
