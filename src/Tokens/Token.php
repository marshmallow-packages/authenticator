<?php

namespace Marshmallow\Authenticator\Tokens;

use Marshmallow\Authenticator\Contracts\TokenInterface;
use Marshmallow\Authenticator\Models\AuthenticatorToken;

class Token implements TokenInterface
{
    protected $token;

    public function __construct(AuthenticatorToken $token)
    {
        $this->token = $token;
    }

    public function getAccessToken()
    {
        return $this->token->access_token;
    }

    public function getLongLivedToken()
    {
        return $this->token->long_lived_token;
    }

    public function getExpiresAt()
    {
        return $this->token->expires_at;
    }

    public function refresh(): self
    {
        return $this;
    }
}
