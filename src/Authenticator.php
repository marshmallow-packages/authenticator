<?php

namespace Marshmallow\Authenticator;

use Marshmallow\Authenticator\Tokens\InstagramToken;
use Marshmallow\Authenticator\Models\AuthenticatorToken;

class Authenticator
{
    public function instagramToken()
    {
        $token = AuthenticatorToken::where('slug', 'instagram-auth')->first();
        return ($token) ? new InstagramToken($token) : null;
    }
}
