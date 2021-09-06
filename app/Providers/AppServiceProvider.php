<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('roleCan', function ($roleName,$permission) {
            return Role::findByName($roleName)->hasPermissionTo($permission);
        });
        Blade::if('roleCanAll', function ($roleName,$permissions) {
            $rolePermissionNames = Role::findByName($roleName)->permissions->pluck('name')->all();
            return (count(array_intersect($rolePermissionNames,$permissions)) === count($permissions));
        });
    }
}
