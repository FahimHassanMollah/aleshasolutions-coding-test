<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Storage;

class UserService
{
    /**
     * Get User collection.
     * @param int|null $paginate
     * @return LengthAwarePaginator|Collection|null
     */
    public static function users(int $paginate = null)
    {
        if (!$paginate){
            return User::orderBy('first_name', 'asc')->get();
        }
        return User::orderBy('first_name', 'asc')->paginate($paginate);
    }

    /**
     * Store new User.
     * @param string $firstName
     * @param string $email
     * @param string $password
     * @param bool $status
     * @param bool $supperAdmin
     * @param int|null $userGroupId
     * @param string|null $title
     * @param string|null $lastName
     * @param string|null $avatar
     * @return User
     */
    public static function storeUser(string $firstName, string $email, string $password, int $status = null, int $supperAdmin= null, int $userGroupId = null, string $title = null,  string $lastName = null, string $avatar = null): User
    {   $user = new User();
        $user->fill([
            'user_group_id' => $userGroupId,
            'title'         => $title,
            'first_name'    => $firstName,
            'last_name'     => $lastName,
            'email'         => $email,
            'avatar'        => $avatar,
            'password'      => self::makePassword($password),
            'status'        => $status ? 1 : 0,
            'super_admin'   => $supperAdmin ? 1 : 0,
        ]);
        $user->save();

        return $user;
    }

    /**
     * Make plain text to hash text password.
     * @param string $plainText
     * @return string
     */
    public static function makePassword(string $plainText): string
    {
        return Hash::make($plainText);
    }

    /**
     * Upload User Avatar File.
     * @param UploadedFile $uploadedFile
     * @param string $disk
     * @param string|null $folder
     * @param null $fileName
     * @return string
     * @throws Exception
     */
    public static function storeAvatar(UploadedFile $uploadedFile, string $disk = 'public', string $folder = null, $fileName = null): string
    {
        if (!$fileName){
            $filePath = $uploadedFile->store($folder, $disk);
        } else {
            $filePath = $uploadedFile->storeAs($folder, time().".".$uploadedFile->getClientOriginalExtension(), $disk);
        }

        if (!$filePath){
            throw new Exception('File not uploaded.');
        }
        return $filePath;

    }

    /**
     * delete avatar.
     * @param string $avatarPath
     */
    public static function deleteAvatar(string $avatarPath): void
    {
        if (Storage::disk('public')->exists($avatarPath)){
            Storage::disk('public')->delete($avatarPath);
        }
    }

    public static function userIsClean(int $userId, string $firstName, string $email, string $password, int $status = null, int $supperAdmin = null, int $userGroupId = null, string $title = null,  string $lastName = null, string $avatar = null): bool
    {
        $user = User::find($userId)->fill([
            'user_group_id' => $userGroupId,
            'title' => $title,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'avatar' => $avatar,
            'password' => $password,
            'status' => $status ? 1 : 0,
            'super_admin' => $supperAdmin ? 1 : 0,
        ]);
        $userIsClean = $user->isClean();
        if ($userIsClean){
            return true;
        }
        return false;
    }

    /**
     * Update User
     * @param int $userId
     * @param string $firstName
     * @param string $email
     * @param string $password
     * @param int|null $status
     * @param int|null $supperAdmin
     * @param int|null $userGroupId
     * @param string|null $title
     * @param string|null $lastName
     * @param string|null $avatar
     * @return User
     */
    public static function updateUser(int $userId, string $firstName, string $email, string $password, int $status = null, int $supperAdmin = null, int $userGroupId = null, string $title = null,  string $lastName = null, string $avatar = null): User
    {
        $user = User::find($userId)->fill([
            'user_group_id' => $userGroupId,
            'title' => $title,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'avatar' => $avatar,
            'password' => $password,
            'status' => $status ? 1 : 0,
            'super_admin' => $supperAdmin ? 1 : 0,
        ]);
        $user->save();
        return $user;
    }

    /**
     * Check User Has Supar Admin access to delete a Super Admin.
     * @param int $userId
     * @param array $selectedId
     * @return bool
     */
    public static function checkSuperAdminDeletePermission(int $userId, array $selectedId = []): bool
    {
        $superAdminUser = User::find($userId)->super_admin;
        $selectedUserWithSuperAdminAccess = User::whereIn('id', $selectedId)->get()->map(function ($user){
            return $user->super_admin;
        })->toArray();
        if (!$superAdminUser && in_array( 1, $selectedUserWithSuperAdminAccess)){
            return false;
        }
        return true;
    }

    public static function checkAdminSelfToDelete(int $userId, array $selectedId = [])
    {
        if (in_array($userId, $selectedId)){
            return false; // can self delete.
        }
        return true;
    }

}
