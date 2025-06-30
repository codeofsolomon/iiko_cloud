<?php

namespace IikoApi\Application\Contracts\Cache;

interface TokenCacheInterface
{
    public function get(string $login): ?string;

    public function put(string $login, string $token, int $ttlSeconds): void;
}
