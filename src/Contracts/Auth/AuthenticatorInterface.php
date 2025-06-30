<?php

namespace IikoApi\Contracts\Auth;

interface AuthenticatorInterface
{
    public function token(): string;
}
