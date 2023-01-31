![Logdo](.github/logo.png?raw=true)

# Logdo, Laravel SDK | ![Tests](https://github.com/logdo/laravel-sdk/actions/workflows/php_versions_compatibilty_and_tests.yml/badge.svg)

LogDo: You production logs, exactly like you are used to them on your local 🥳

- Simple interface for viewing logs
- App based logging setup
- Members can join teams and have access to teams' apps logs.
- Clean APIs and SDKs...

... and many more ....

## Usage
It takes care of itself. Thanks to Laravels excellent Package discovery feature and event system.

## Help and docs

We use GitHub issues only to discuss bugs and new features. For support please refer to:

- [Documentation](http://logdo.dev/docs)


## Installing Logdo laravel SDK

The recommended way to install the SDK through [Composer](https://getcomposer.org/)

```bash
composer require logdo/logdo-laravel
```

Publish the config file
```bash
php artisan vendor:publish --tag=config
```

The config `logdo.php` will be published into your config/ directory. We encourage you to take a look at it and make the necessary adjustments.

## Credit

This is heavily inspire by Laravel Telecope. Credit to Taylor Otwell and Muhamed Said for putting together such a wonderful package.

## Contributing

Contributions are welcome in any form.


## Bug and Security Report

Report and bugs and security issue to `theguys@theoneapp.rocks`
