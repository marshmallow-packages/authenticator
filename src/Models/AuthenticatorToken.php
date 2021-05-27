<?php

namespace Marshmallow\Authenticator\Models;

use Illuminate\Database\Eloquent\Model;

class AuthenticatorToken extends Model
{
    protected $guarded = [];

    protected $casts = [
        'expires_at' => 'datetime',
    ];
}
