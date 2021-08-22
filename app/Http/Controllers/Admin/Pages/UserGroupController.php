<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserGroup\DeleteUserGroupRequest;
use App\Http\Requests\UserGroup\StoreUserGroupRequest;
use App\Http\Requests\UserGroup\UpdateUserGroupRequest;
use App\Models\UserGroup;
use App\Services\UserGroupService;
use App\Services\UserPermissionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;

class UserGroupController extends Controller
{
    public function index(): View
    {
        $userGroups = UserGroupService::userGroups();
        return view('pages.admin.user-groups.index')->with(['userGroups' => $userGroups]);
    }

    public function create(): View
    {
        $userPermissionGroupsWithUserPermissions = UserGroupService::userPermissionGroupsWithPermissions();
        return view('pages.admin.user-groups.create')->with(['userPermissionGroups' => $userPermissionGroupsWithUserPermissions]);
    }


    public function store(StoreUserGroupRequest $storeUserGroupRequest): RedirectResponse
    {
        $userGroupName = $storeUserGroupRequest->name;
        $userPermissionId = $storeUserGroupRequest->user_permission_id;

        try {
            UserGroupService::storeUserGroup($userGroupName, $userPermissionId);
        } catch (Throwable $exception){
            return redirect()->route('admin.userGroups.index')->withMessage("Error! Message: ".$exception->getMessage());
        }

        return redirect()->route('admin.userGroups.index')->withMessage('Success! Data inserted.');
    }

    public function show(UserGroup $userGroup): View
    {
        $userGroupAssignedUserPermissions = UserGroupService::userGroupAssignedUserPermissions($userGroup->id);
        return view('pages.admin.user-groups.show')->with([
            'userGroup'                => $userGroup,
            'assignedUserPermissions'  => $userGroupAssignedUserPermissions,
        ]);
    }

    public function edit(UserGroup $userGroup): View
    {
        $userGroupAssignedUserPermissions = UserGroupService::userGroupAssignedUserPermissions($userGroup->id);
        return view('pages.admin.user-groups.edit')->with([
            'userGroup'                 => $userGroup,
            'assignedUserPermissions'  => $userGroupAssignedUserPermissions,
        ]);
    }

    public function update(UpdateUserGroupRequest $updateUserGroupRequest, UserGroup $userGroup): RedirectResponse
    {
        $userGroupName      = $updateUserGroupRequest->name;
        $userPermissionId   = $updateUserGroupRequest->user_permission_id;
        $userGroupId        = $userGroup->id;

        if (UserGroupService::userGroupAndAssignedUserPermissionsIsClean($userGroupName, $userPermissionId, $userGroupId))
        {
            return back()->withMessage('Error! Must one value have to change on update.');
        }
        $userGroup->save();

        if (!UserGroupService::assignedUserPermissionsAreClean($userPermissionId, $userGroupId))
        {
            UserPermissionService::attachUserPermissionToUserGroup($userGroupId, $userPermissionId);
        }
        return redirect()->route('admin.userGroups.show', $userGroup->id)->withMessage('Success! Data updated.');
    }


    public function destroy(DeleteUserGroupRequest $deleteUserGroupRequest): RedirectResponse
    {
        UserGroup::destroy($deleteUserGroupRequest->selected_id);
        return redirect()->back()->withMessage('Success! Data deleted.');
    }







}
