<?php

namespace IikoApi\Infrastructure\Auth;

use IIkoApi\Constants;
use IikoApi\Contracts\Auth\AuthenticatorInterface;
use IikoApi\Contracts\Cache\TokenCacheInterface;
use IikoApi\Contracts\Http\ApiClientInterface;
use IikoApi\Domain\Exceptions\UnauthorizedException;

final class TokenAuthenticator implements AuthenticatorInterface
{
    public function __construct(
        private ApiClientInterface $http,
        private TokenCacheInterface $cache,
        private string $login = '',
        private int $skew = 60, // «запас» до истечения
    ) {
        $this->login = $this->login ?: config('iiko-api.login');
    }

    public function token(): string
    {
        // 1️⃣  Берём из кеша
        if ($cached = $this->cache->get($this->login)) {
            return $cached;
        }

        $response = $this->http->request('POST', Constants::ACCESS_TOKEN_URL, [
            Constants::API_LOGIN => $this->login,
        ]);

        if (! isset($response['token']) || empty($response['token'])) {
            throw new UnauthorizedException('Authorization failed: token is missing');
        }

        $ttl = max(60, (int) ($response['expiresIn'] ?? 3600) - $this->skew); // минимум минута

        $this->cache->put($this->login, $response['token'], $ttl);

        return $response['token'];
    }
}
