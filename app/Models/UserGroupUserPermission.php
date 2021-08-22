<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class UserGroupUserPermission is a pivot class between UserGroup and UserPermission.
 * @package App\Models\Admin
 */
class UserGroupUserPermission extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable for UserGroupUserPermission.
     *
     * @var array
     */
    protected $fillable = [
        'user_group_id',
        'user_permission_id',
    ];

    /**
     * The database table name for UserGroupUserPermission.
     * @var string
     */
    protected $table = 'user_group_user_permission';

    /**
     * Belongs to relations with UserGroupPermission and UserGroup
     * @return BelongsTo
     */
    public function UserGroup(): BelongsTo
    {
       return $this->belongsTo(UserGroup::class,'user_group_id','id');
    }

    /**
     * Belongs to relations with UserGroupPermission and UserPermission
     * @return BelongsTo
     */
    public function UserPermission(): BelongsTo
    {
        return $this->belongsTo(UserPermission::class,'user_permission_id','id');
    }
}
