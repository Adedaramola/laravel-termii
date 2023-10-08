# Laravel Termii

[![Latest Version on Packagist](https://img.shields.io/packagist/v/adedaramola/laravel-termii.svg?style=flat-square)](https://packagist.org/packages/adedaramola/laravel-termii)
[![Total Downloads](https://img.shields.io/packagist/dt/adedaramola/laravel-termii.svg?style=flat-square)](https://packagist.org/packages/adedaramola/laravel-termii)

## Installation

You can install the package via composer:

```bash
composer require adedaramola/laravel-termii
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="termii-config"
```

## Set up

To start using this package, you need to add environment variables for:

- `TERMII_URL` - Optional, not really needed as this has a default
- `TERMII_API_KEY` - You can get this from your [Termii dashboard](https://accounts.termii.com).

The package will pick these up in its configuration and use these when it resolves an instance of the `TermiiClient`.