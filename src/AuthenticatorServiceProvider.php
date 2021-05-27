<?php

namespace Marshmallow\Authenticator;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Marshmallow\Authenticator\Instagram\Commands\InstagramAuthCommand;

class AuthenticatorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('authenticator')
            ->hasConfigFile()
            ->hasMigration('create_authenticator_table')
            ->hasCommand(InstagramAuthCommand::class);
    }
}
