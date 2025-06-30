<?php

declare(strict_types=1);

namespace IikoApi\Application\Contracts\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface ApiClientInterface
{
    public function send(RequestInterface $request): ResponseInterface;
}
