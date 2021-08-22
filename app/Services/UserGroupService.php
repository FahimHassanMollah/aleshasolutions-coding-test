<?php

namespace App\Services;

use App\Models\UserGroupUserPermission;
use App\Models\UserGroup;
use App\Models\UserPermissionGroup;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Exception;

class UserGroupService
{
    /**
     * Get all UserGroup.
     * @return LengthAwarePaginator|null
     */
    public static function userGroups(): ?LengthAwarePaginator
    {
        return UserGroup::orderBy('name', 'asc')->paginate(20);
    }

    /**
     * Get all UserGroup with all associated UserPermission.
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
     * Store User Group with associating UserPermission.
     * @param string $name
     * @param array $userPermissionId
     * @return UserGroup
     * @throws Exception
     */
    public static function storeUserGroup(string $name, array $userPermissionId = []): UserGroup
    {
        $userGroup = UserGroup::create(['name' => $name]);

        if (!$userGroup){
            throw new Exception('User Group not created.');
        }

        if ($userPermissionId) {
            UserPermissionService::attachUserPermissionToUserGroup($userGroup->id, $userPermissionId);
        }

        return $userGroup;
    }

    /**
     * get assigned UserPermissions of a particular UserGroup.
     * @param int $userGroupId
     * @return SupportCollection|null
     */
    public static function userGroupAssignedUserPermissions(int $userGroupId): ?SupportCollection
    {
        $assignedPermissions = self::userGroupAssignedUserPermissionsId($userGroupId);
        $userPermissions = UserPermissionService::userPermissionGroupsWithPermissions();

        return $userPermissions->map(function ($userPermissionGroup) use ($assignedPermissions){
            $userPermissionGroupArray = [
                'id'    => $userPermissionGroup->id,
                'name'  =>$userPermissionGroup->name,
            ];
            $userPermissionsArray = [];
            if ($userPermissionGroup->userPermissions){
                foreach($userPermissionGroup->userPermissions as $userPermission){
                    $userPermissionDetails = [
                        'id'        => $userPermission->id,
                        'name'      => $userPermission->name,
                        'slug'      => $userPermission->slug,
                    ];
                    if ($assignedPermissions->contains($userPermission->id)){
                        $userPermissionDetails['is_assign'] =  true;
                    }else{
                        $userPermissionDetails['is_assign'] =  false;
                    }
                    array_push($userPermissionsArray, $userPermissionDetails);
                }
            }
            return [
                'user_permission_group_name'    => $userPermissionGroupArray,
                'user_permissions'              => $userPermissionsArray,
            ];

        });
    }

    /**
     * Get a collection of assigned UserPermissions Id of a particular UserGroup.
     * @param int $userGroupId
     * @return Collection|null
     */
    public static function userGroupAssignedUserPermissionsId(int $userGroupId): ?SupportCollection
    {
        return UserGroupUserPermission::select('user_permission_id')
            ->where('user_group_id', $userGroupId)->get()
            ->map(function ($assignedPermission){
                return $assignedPermission->user_permission_id;
            });
    }

    /**
     * Check UserGroup and assigned UserPermission IsClean or not.
     * @param string $name
     * @param array $requestUserPermissionIdArray
     * @param int $userGroupId
     * @return bool
     */
    public static function userGroupAndAssignedUserPermissionsIsClean(string $name, array $requestUserPermissionIdArray, int $userGroupId): bool
    {
        $userGroupIsClean = self::userGroupIsClean($name, $userGroupId);
        $assignedUserPermissionsAreClean = self::assignedUserPermissionsAreClean($requestUserPermissionIdArray, $userGroupId);

        if ($userGroupIsClean && $assignedUserPermissionsAreClean){
            return true;
        } else{
            return false;
        }
    }

    /**
     * Check User Group isClean or not.
     * @param string $name
     * @param int $userGroupId
     * @return bool
     */
    public static function userGroupIsClean(string $name, int $userGroupId): bool
    {
        $userGroup = UserGroup::find($userGroupId)->fill(['name' => $name]);
        $userGroupIsClean = $userGroup->isClean();
        if ($userGroupIsClean){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check assigned UserPermission isClean or not.
     * @param array $requestUserPermissionIdArray
     * @param int $userGroupId
     * @return bool
     */
    public static function assignedUserPermissionsAreClean(array $requestUserPermissionIdArray, int $userGroupId): bool
    {
        $assignedUserPermissionIdArray = self::userGroupAssignedUserPermissionsId($userGroupId)->toArray();
        $userPermissionsAreClean = array_diff($requestUserPermissionIdArray, $assignedUserPermissionIdArray) == [] && array_diff($assignedUserPermissionIdArray, $requestUserPermissionIdArray) == [];
        if ($userPermissionsAreClean) {
            return true;
        } else {
            return false;
        }
    }
}
