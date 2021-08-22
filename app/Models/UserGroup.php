<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserGroup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable for UserGroup.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Belongs to many relations with UserGroup and UserPermission.
     * @return BelongsToMany
     */
    public function userPermissions(): BelongsToMany
    {
        return $this->belongsToMany(UserPermission::class)->using(UserGroupUserPermission::class)->withTimestamps();
    }

}
