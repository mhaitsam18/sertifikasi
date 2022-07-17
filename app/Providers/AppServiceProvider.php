<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        //

        Paginator::useBootstrap();
        Gate::define('admin', function (User $user) {
            if ($user->role_id == 1) {
                return true;
            } else {
                return false;
            }
        });

        Gate::define('koordinator', function (User $user) {
            return $user->dosen->is_koordinator;
        });
        Gate::define('kaprodi', function (User $user) {
            return $user->dosen->is_kaprodi;
        });
    }
}
