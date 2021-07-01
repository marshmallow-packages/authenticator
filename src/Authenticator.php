<?php

namespace Marshmallow\Authenticator;

use Marshmallow\Authenticator\Models\AuthenticatorToken;
use Marshmallow\Authenticator\Tokens\InstagramToken;

class Authenticator
{
    public function instagramToken()
    {
        $token = AuthenticatorToken::where('slug', 'instagram-auth')->first();

        return ($token) ? new InstagramToken($token) : null;
    }
}
