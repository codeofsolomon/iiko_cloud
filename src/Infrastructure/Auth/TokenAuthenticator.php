<?php

declare(strict_types=1);

namespace IikoApi\Infrastructure\Auth;

use GuzzleHttp\Psr7\Utils;
use IikoApi\Application\Contracts\Auth\AuthenticatorInterface;
use IikoApi\Application\Contracts\Cache\TokenCacheInterface;
use IikoApi\Application\Contracts\Http\ApiClientInterface;
use IIkoApi\Constants;
use IikoApi\Domain\Exceptions\UnauthorizedException;
use Psr\Http\Message\RequestFactoryInterface;

final class TokenAuthenticator implements AuthenticatorInterface
{
    private const CACHE_KEY = 'iiko_cloud:access_token';

    public function __construct(
        private ApiClientInterface $api,
        private TokenCacheInterface $cache,
        private readonly RequestFactoryInterface $requestFactory,
        private string $login,
        private readonly int $ttlFallback // «запас» до истечения
    ) {}

    public function token(): string
    {
        return $this->cache->remember(
            self::CACHE_KEY,
            $this->ttlFallback,
            fn () => $this->requestNewToken()
        );
    }

    private function requestNewToken(): string
    {
        $req = $this->requestFactory->createRequest('POST', Constants::ACCESS_TOKEN_URL)
            ->withHeader('Content-Type', 'application/json')
            ->withBody(Utils::streamFor(json_encode([
                Constants::API_LOGIN => $this->login,
            ], JSON_THROW_ON_ERROR)));

        $res = $this->api->send($req);

        if ($res->getStatusCode() !== 200) {
            throw new UnauthorizedException('Unable to fetch access token');
        }

        /** @var array{token:string,expiresIn:int} $data */
        $data = json_decode((string) $res->getBody(), true, 512, JSON_THROW_ON_ERROR);

        return $data['token'];
    }
}
