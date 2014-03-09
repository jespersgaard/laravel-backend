Laravel Backend
=====================

An extendable universal backend for Laravel.

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/Jeroen-G/laravel-backend/badges/quality-score.png?s=80453c364b70d70cbcfbf1cb9c4085518e3abc2b)](https://scrutinizer-ci.com/g/Jeroen-G/laravel-backend/)
[![Latest Stable Version](https://poser.pugx.org/jeroen-g/laravel-backend/v/stable.png)](https://packagist.org/packages/jeroen-g/laravel-backend)

## Installation ##

Add this line to your `composer.json`:

	"jeroen-g/laravel-backend": "dev-master"

Then update Composer

    composer update

Add the service providers in `app/config/app.php`:

    'JeroenG\LaravelBackend\LaravelBackendServiceProvider',
    'JeroenG\LaravelAuth\LaravelAuthServiceProvider',
	'JeroenG\ActivityLogger\ActivityLoggerServiceProvider',

This package uses my auth package to manage the users. To migrate to create the tables for the users, roles and permissions, you should use this command:

	php artisan migrate --package="jeroen-g/laravel-auth"

