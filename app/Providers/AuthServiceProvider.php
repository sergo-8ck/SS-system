<?php

namespace App\Providers;

use App\Entity\Adverts\Advert\Advert;
use App\Entity\Banner\Banner;
use App\Entity\Ticket\Ticket;
use App\Entity\User\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];

    public function boot(): void
    {
        $this->registerPolicies();
        $this->registerPermissions();

        Passport::routes();
    }

    private function registerPermissions(): void
    {
        Gate::define('admin-panel', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-pages', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-users', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-tickets', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-regions', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-adverts', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-adverts-categories', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-banners', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('show-advert', function (User $user, Advert $advert) {
            return $user->isAdmin() || $user->isModerator() || $advert->user_id == $user->id;
        });

        Gate::define('manage-own-subdomain', function (User $user) {
            if($user->isAdmin() || $user->isModerator())
                return  \Request::route('subdomain_userid') != $user->id && $user->find(\Request::route('subdomain_userid'))->isActive();
            else
                return  \Request::route('subdomain_userid') == $user->id && $user->find(\Request::route('subdomain_userid'))->isActive();
        });

        Gate::define('manage-own-advert', function (User $user, Advert $advert) {
            return $advert->user_id === $user->id;
        });

        Gate::define('manage-own-banner', function (User $user, Banner $banner) {
            return $banner->user_id === $user->id;
        });

        Gate::define('manage-own-ticket', function (User $user, Ticket $ticket) {
            return $ticket->user_id === $user->id;
        });
    }
}
