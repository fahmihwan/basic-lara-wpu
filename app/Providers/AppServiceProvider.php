<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useBootstrapFive();

        Gate::define('isAdmin', function (User $user) {          //<-- fitur 23. Authorization
            // return $user->username !== 'fahmihwan';         //<-- gerbangnya dapat di akses yg usernya = fahmihwan
            return $user->is_admin;                           //<-- login multi user
        });
    }
}
