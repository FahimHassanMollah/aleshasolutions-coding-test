<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserGroupService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(): View
    {
        $users = UserService::users(20);
        return view('pages.admin.users.index')->with(['users' => $users]);
    }

    public function create(): View
    {
        $userGroups = UserGroupService::userGroups();
        return view('pages.admin.users.create')->with(['user_groups' => $userGroups]);
    }

    public function store(StoreUserRequest $storeUserRequest): RedirectResponse
    {
        if($storeUserRequest->avatar){
            try {
                $avatarPath = UserService::storeAvatar($storeUserRequest->avatar, 'public', 'avatar', '');
            } catch (\Throwable $exception){
                return redirect()->back()->withMessage("Error! Message: ".$exception->getMessage());
            }
        } else {
            $avatarPath = null;
        }

        $user = UserService::storeUser($storeUserRequest->first_name, $storeUserRequest->email, $storeUserRequest->password, $storeUserRequest->status, $storeUserRequest->super_admin, $storeUserRequest->user_group_id, $storeUserRequest->title, $storeUserRequest->last_name, $avatarPath);
        return redirect()->route('admin.users.show', $user->id)->withMessage('Success! Data created.');
    }

    public function show(User $user): View
    {
        return view('pages.admin.users.show')->with(['user' => $user->load('userGroup')]);
    }

    public function edit(User $user): View
    {
        $userGroups = UserGroupService::userGroups();
        return view('pages.admin.users.edit')->with(['user' => $user, 'userGroups' => $userGroups]);
    }

    public function update(UpdateUserRequest $updateUserRequest, User $user)
    {
        if($updateUserRequest->avatar){
            try {
                $avatarPath = UserService::storeAvatar($updateUserRequest->avatar, 'public', 'avatar', '');
                if ($user->avatar){
                    UserService::deleteAvatar($user->avatar);
                }
            } catch (\Throwable $exception){
                return redirect()->back()->withMessage("Error! Message: ".$exception->getMessage());
            }
        } else {
            $avatarPath = $user->avatar;
        }

        if ($updateUserRequest->password){
            $password = UserService::makePassword($updateUserRequest->password);
        } else {
            $password = $user->password;
        }

        if (UserService::userIsClean($user->id, $updateUserRequest->first_name, $updateUserRequest->email, $password, $updateUserRequest->status, $updateUserRequest->super_admin, $updateUserRequest->user_group_id, $updateUserRequest->title, $updateUserRequest->last_name, $avatarPath)){
            return back()->withMessage('Error! Must one value have to change on update.');
        }
        UserService::updateUser($user->id, $updateUserRequest->first_name, $updateUserRequest->email, $password, $updateUserRequest->status, $updateUserRequest->super_admin, $updateUserRequest->user_group_id, $updateUserRequest->title, $updateUserRequest->last_name, $avatarPath);

        return redirect()->route('admin.users.show', $user->id)->withMessage('Success! Data Updated.');
    }

    public function destroy(DeleteUserRequest $deleteUserRequest)
    {
        $userId = Auth::id();
        $selectedId = $deleteUserRequest->selected_id;

        $checkSuperAdminDeletePermission = UserService::checkSuperAdminDeletePermission($userId, $selectedId);

        if (!$checkSuperAdminDeletePermission){
            return redirect()->back()->withMessage('You are not permitted to delete any Super Admin');
        }

        $checkAdminSelfToDelete = UserService::checkAdminSelfToDelete($userId, $selectedId);

        if (!$checkAdminSelfToDelete){
            return redirect()->back()->withMessage('You are not permitted to delete yourself.');
        }
        User::destroy($selectedId);
        return redirect()->back()->withMessage('Success! Data deleted.');
    }
}
