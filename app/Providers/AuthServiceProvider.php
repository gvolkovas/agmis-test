<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\PermissionsRepository;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [];



    public function boot()
    {
        $this->registerPolicies();

        /** @var PermissionsRepository $permissionsRepository */
        $permissionsRepository = resolve(PermissionsRepository::class);
        foreach ($permissionsRepository->getAll() as $permission) {
            Gate::define($permission->permission_key, function (User $user) use ($permission) {
                $permissions = $user->permissions()->pluck('permission_key')->toArray();
                return in_array($permission->permission_key, $permissions);
            });
        }
    }
}
