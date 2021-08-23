<?php

namespace App\Services;

use App\Models\UserPermission;
use App\Models\UserPermissionGroup;
use App\Models\UserGroup;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserPermissionService
{
    /**
     * Get all UserPermissionGroup with associated UserPermissions.
     * @return Collection|null
     */
    public static function userPermissionGroupsWithPermissions(): ?Collection
    {
        return UserPermissionGroup::select('id', 'name')->orderBy('name', 'asc')
            ->with(['userPermissions' => function($query){
                $query->select('id', 'user_permission_group_id', 'name', 'slug')->orderBy('name', 'asc');
            }])->get();
    }
    /**
     * Attach UserPermission to UserGroup.
     * @param int $userGroupId
     * @param array $userPermissionId
     * @param bool $detachExisting
     * @return array|null
     */
    public static function attachUserPermissionToUserGroup(int $userGroupId, array $userPermissionId = [], bool $detachExisting = true): ?array
    {
        $userGroup = UserGroup::find($userGroupId);
        return $detachExisting ? $userGroup->userPermissions()->sync($userPermissionId) : $userGroup->userPermissions()->attach($userPermissionId);
    }

    /**
     * Get UserPermission collection.
     * @param int|null $paginate
     * @return LengthAwarePaginator|Collection|null
     */
    public static function userPermissions(int $paginate = null)
    {
        if (!$paginate){
            return UserPermission::all();
        }
        return UserPermission::paginate($paginate);
    }
}
