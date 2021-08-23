<?php

namespace App\Providers;

use App\Models\User;
use App\Models\UserPermission;
use App\Services\UserPermissionService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user) {
            if ($user->isSuperAdministrator($user)) {
                return true;
            }
        });

        if (Schema::hasTable('user_permissions')){
            foreach (UserPermissionService::userPermissions() as $userPermission){
                Gate::define($userPermission->slug, function (User $user) use ($userPermission) {
                    return UserPermission::whereHas('userGroups', function ($query) use ($user){
                        $query->whereHas('users', function ($query) use($user){
                            $query->where('id', $user->id);
                        });
                    })->whereId($userPermission->id)->count();
                });
            }
        }
    }
}
