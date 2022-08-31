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
            if (session()->get('role_dosen') != "koordinator") {
                return false;
            } else {
                return true;
            }
            // return $user->dosen->is_koordinator;
        });
        Gate::define('kaprodi', function (User $user) {
            if (session()->get('role_dosen') != "kaprodi") {
                return false;
            } else {
                return true;
            }
            // return $user->dosen->is_kaprodi;
        });
        Gate::define('instruktur', function (User $user) {
            if (session()->get('role_dosen') != "instruktur") {
                return false;
            } else {
                return true;
            }
            // return $user->dosen->is_instruktur;
        });
    }
}
