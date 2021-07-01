<?php

namespace Marshmallow\Authenticator;

use Marshmallow\Authenticator\Instagram\Commands\InstagramAuthCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
