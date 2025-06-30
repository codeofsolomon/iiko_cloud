<?php

namespace IikoApi\Contracts\Http;

interface ApiClientInterface
{
    public function request(string $method, string $uri, array $params = [], array $headers = []): array;
}
