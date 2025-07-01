<?php

declare(strict_types=1);

namespace IikoApi;

use IikoApi\Application\Contracts\Http\ApiClientInterface;
use IikoApi\Application\Services\BaseService;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;
use Illuminate\Support\Str;

class IikoApiClient
{
    public function __construct(
        protected ApiClientInterface $api,
        protected TokenAuthenticator $auth
    ) {}

    public function __call(string $name, array $arguments): BaseService
    {
        $class = __NAMESPACE__.'\\Application\\Services\\'.Str::studly($name).'Service';

        return new $class(
            $this->api, 
            $this->auth, 
            app(\Psr\Http\Message\RequestFactoryInterface::class)
        );
    }
}
