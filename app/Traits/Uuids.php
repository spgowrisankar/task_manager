<?php
namespace App\Traits;

use Webpatser\Uuid\Uuid;

trait Uuids {
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }
}
