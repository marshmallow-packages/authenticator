<?php

namespace Marshmallow\Authenticator\Facades;

use Illuminate\Support\Facades\Facade;
use Marshmallow\Authenticator\Authenticator as BaseAuthenticator;

/**
 * @see \Marshmallow\Authenticator\Authenticator
 */
class Authenticator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new BaseAuthenticator;
    }
}
