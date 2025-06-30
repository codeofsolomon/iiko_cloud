<?php

namespace IikoApi\Infrastructure\Cache;

use IikoApi\Contracts\Cache\TokenCacheInterface;
use Illuminate\Contracts\Cache\Repository as Cache;

final readonly class LaravelTokenCache implements TokenCacheInterface
{
    public function __construct(private Cache $store) {}

    public function get(string $login): ?string
    {
        return $this->store->get($this->key($login));
    }

    public function put(string $login, string $token, int $ttlSeconds): void
    {
        $this->store->put($this->key($login), $token, $ttlSeconds);
    }

    private function key(string $login): string
    {
        return 'iiko:token:'.md5($login);
    }
}
