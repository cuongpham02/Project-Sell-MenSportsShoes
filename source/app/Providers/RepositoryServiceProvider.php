<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\Admin\Permission\PermissionRepository::class, \App\Repositories\Admin\Permission\PermissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\Category\CategoryRepository::class, \App\Repositories\Admin\Category\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\User\UserRepository::class, \App\Repositories\User\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\Role\RoleRepository::class, \App\Repositories\Admin\Role\RoleRepositoryEloquent::class);
        //:end-bindings:
    }
}
