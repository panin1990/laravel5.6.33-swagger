<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Bridge\PersonalAccessGrant;
use League\OAuth2\Server\AuthorizationServer;
use DateInterval;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->get(AuthorizationServer::class)
            ->enableGrantType(new PersonalAccessGrant(), new DateInterval('P1W'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
