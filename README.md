# A package to simply authenticate with differt platforms like Instagram, Zoho Desk, Facebook etc.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marshmallow/authenticator.svg?style=flat-square)](https://packagist.org/packages/marshmallow/authenticator)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/marshmallow/authenticator/run-tests?label=tests)](https://github.com/marshmallow/authenticator/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/marshmallow/authenticator/Check%20&%20fix%20styling?label=code%20style)](https://github.com/marshmallow/authenticator/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/marshmallow/authenticator.svg?style=flat-square)](https://packagist.org/packages/marshmallow/authenticator)

This package makes it super easy to authenticate with different api's. As of this moment we only support Instagram auth but we will add more as soon as we need them, and that should be soon. Just run `Authenticator::instagramToken()->refresh()->getAccessToken()` and you have your token available.

## Installation

You can install the package via composer:

```bash
composer require marshmallow/authenticator
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Marshmallow\Authenticator\AuthenticatorServiceProvider" --tag="authenticator-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Marshmallow\Authenticator\AuthenticatorServiceProvider" --tag="authenticator-config"
```

This is the contents of the published config file:

```php
return [
    'instagram' => [
        'client_id' => env('AUTH_INSTAGRAM_CLIENT_ID', null),
        'client_secret' => env('AUTH_INSTAGRAM_CLIENT_SECRET', null),
        'redirect_uri' => env('AUTH_INSTAGRAM_REDIRECT_URI', null),
    ],
];
```

## Usage

You can run the command below to start the authentication process with Instagram. Follow the steps in your command line and this package will do the magic for you.

```bash
php artisan auth:instagram
```

Once you've run the command above, you can get the access token from Instagram as shown below.

```php
use Marshmallow\Authenticator\Facades\Authenticator;

Authenticator::instagramToken()->refresh()->getAccessToken();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Stef van Esch](https://github.com/marshmallow-packages)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
