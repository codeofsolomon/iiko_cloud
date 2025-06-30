<?php

declare(strict_types=1);

namespace IikoApi\Providers;

use IikoApi\Application\Contracts\Auth\AuthenticatorInterface;
use IikoApi\Application\Contracts\Cache\TokenCacheInterface;
use IikoApi\Application\Contracts\Http\ApiClientInterface;
use IIkoApi\IikoApiClient;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;
use IikoApi\Infrastructure\Cache\LaravelTokenCache;
use IikoApi\Infrastructure\Http\GuzzleApiClient;
use Illuminate\Cache\CacheManager;
use Illuminate\Contracts\Config\Repository as ConfigRepo;
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
        /** @var ConfigRepo $config */
        $config = $this->app['config'];

        // 1) low-level HTTP client
        $this->app->singleton(ApiClientInterface::class, function () use ($config) {
            return GuzzleApiClient::build(
                baseUri: $config->get('iiko-api.base_uri'),
                timeout: (float) $config->get('iiko-api.timeout'),
                logger: $this->app->make(\Psr\Log\LoggerInterface::class)
            );
        });

        // 2) token cache
        $this->app->bind(TokenCacheInterface::class, function () use ($config) {
            /** @var CacheManager $cache */
            $cache = $this->app->make(CacheManager::class);

            return new LaravelTokenCache(
                $config->get('iiko-api.cache_store')
                    ? $cache->store($config->get('iiko-api.cache_store'))
                    : $cache->store()
            );
        });

        // 3) authenticator
        $this->app->singleton(AuthenticatorInterface::class, function () use ($config) {
            return new TokenAuthenticator(
                api          : $this->app->make(ApiClientInterface::class),
                cache        : $this->app->make(TokenCacheInterface::class),
                requestFactory: $this->app->make(\Psr\Http\Message\RequestFactoryInterface::class),
                login        : $config->get('iiko-api.login'),
                ttlFallback  : (int) $config->get('iiko-api.token_cache_ttl')
            );
        });

        // 4) facade-like main client
        $this->app->singleton(IikoApiClient::class, fn () => new IikoApiClient(
            $this->app->make(ApiClientInterface::class),
            $this->app->make(AuthenticatorInterface::class)
        ));

        $this->app->alias(IikoApiClient::class, 'iiko-api');
    }
}
