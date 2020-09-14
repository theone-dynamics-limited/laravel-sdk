![Logdo](.github/logo.png?raw=true)

# Logdo, Laravel SDK

Logdo is a self hosted application logging server that brings back the fun in reading logs.

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

The recommended way to install the SDK through
[Composer](https://getcomposer.org/). Note that the SDK requires 
```php
"php":">=7.2",
"logdo/logdo-php": "dev-master"
```

Seriously, because why not? php5.6 is so 2016. I was't even writing php back then!

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

