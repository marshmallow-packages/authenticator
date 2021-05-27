<?php

namespace Marshmallow\Authenticator\Tokens;

use Illuminate\Support\Facades\Http;

class InstagramToken extends Token
{
    public function refresh(): self
    {
        $response = Http::get(
            "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token={$this->token->long_lived_token}"
        );

        $this->token->update([
            'access_token' => $response->json()['access_token'],
        ]);
        $this->token->fresh();

        return $this;
    }
}
