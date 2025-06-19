<?php

namespace IikoApi;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use GuzzleHttp\Client as GuzzleClient;
use IikoApi\Http\GuzzleApiClient;
use IikoApi\Auth\TokenAuthenticator;

class IikoApiServiceProvider extends BaseServiceProvider
{

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/iiko-api.php' => config_path('iiko-api.php'),
        ]);
    }


    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/iiko-api.php', 'iiko-api'
        );

        $this->app->singleton(IikoApiClient::class, function ($app): IikoApiClient {
            $login = config('iiko-api.login');
            $timeout = config('iiko-api.timeout', 15.0);

            $guzzle = new GuzzleClient(['base_uri' => Constants::API_URL]);
            $apiClient = new GuzzleApiClient($guzzle);
            $authenticator = new TokenAuthenticator($login, $apiClient);

            return new IikoApiClient($apiClient, $authenticator);
        });
    }
}