<?php

namespace IikoApi\Auth;

use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Exceptions\IIkoAuthException;
use IikoApi\Constants;

class TokenAuthenticator
{
    private ?string $token = null;
    private int $expiresAt = 0;

    public function __construct(
        protected string $login,
        protected ApiClientInterface $apiClient,
        protected int $ttl = 180 // Время жизни токена в секундах
    ) {}

    /**
     * Получает валидный токен. Авторизуется заново при необходимости.
     *
     * @throws IIkoAuthException
     */
    public function getToken(): string
    {
        if (! $this->isTokenValid()) {
            $this->authenticate();
        }

        return $this->token;
    }

    /**
     * Проверка срока действия токена.
     */
    private function isTokenValid(): bool
    {
        return $this->token !== null && $this->expiresAt > time();
    }

    /**
     * Выполняет авторизацию и сохраняет токен.
     *
     * @throws IIkoAuthException
     */
    private function authenticate(): void
    {
        $response = $this->apiClient->request('POST', Constants::ACCESS_TOKEN_URL, [
            Constants::API_LOGIN => $this->login,
        ]);

        if (!isset($response['token']) || empty($response['token'])) {
            throw new IIkoAuthException('Authorization failed: token is missing');
        }

        $this->token = $response['token'];
        $this->expiresAt = time() + $this->ttl;
    }
}
