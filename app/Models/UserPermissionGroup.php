<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class UserPermissionGroup extends Model
{
    use HasFactory;


    public function userPermissions(): HasMany
    {
        return $this->hasMany(UserPermission::class,'user_permission_group_id','id');

    }
}
