<?php

namespace Marshmallow\Authenticator\Contracts;

interface TokenInterface
{
    public function refresh(): self;
}
