<?php

namespace IikoApi\Providers;

use GuzzleHttp\Client as GuzzleClient;
use IIkoApi\Constants;
use IikoApi\Contracts\Auth\AuthenticatorInterface;
use IikoApi\Contracts\Cache\TokenCacheInterface;
use IikoApi\Contracts\Http\ApiClientInterface;
use IikoApi\Http\GuzzleApiClient;
use IIkoApi\IikoApiClient;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;
use IikoApi\Infrastructure\Cache\LaravelTokenCache;
use Illuminate\Cache\CacheManager;
use Illuminate\Contracts\Cache\Repository as CacheStore;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class IikoApiServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/iiko-api.php' => config_path('iiko-api.php'),
            ], 'iiko-api-config');
        }
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Merge default config
        $this->mergeConfigFrom(__DIR__.'/../../config/iiko-api.php', 'iiko-api');

        $guzzle = new GuzzleClient(['base_uri' => Constants::API_URL, 'timeout' => (float) config('iiko-api.timeout')]);

        $this->app->bind(ApiClientInterface::class, fn () => new GuzzleApiClient($guzzle));

        // Bind token cache (uses selected CACHE_DRIVER)
        $this->app->bind(TokenCacheInterface::class, function () {
            /** @var CacheStore $store */
            $store = app(CacheManager::class)->store();

            return new LaravelTokenCache($store);
        });

        // Authenticator singleton
        $this->app->singleton(AuthenticatorInterface::class, function ($app) {
            return new TokenAuthenticator(
                $app->make(ApiClientInterface::class),
                $app->make(TokenCacheInterface::class),
                config('iiko-api.login')
            );
        });

        // Main client
        $this->app->singleton(IikoApiClient::class, function ($app) {
            return new IikoApiClient(
                $app->make(ApiClientInterface::class),
                $app->make(AuthenticatorInterface::class)
            );
        });

        $this->app->alias(IikoApiClient::class, 'iiko-api');
    }
}
