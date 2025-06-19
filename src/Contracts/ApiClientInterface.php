<?php

namespace IikoApi\Contracts;

interface ApiClientInterface
{
    public function request(string $method, string $uri, array $params = [], array $headers = []): array;
}