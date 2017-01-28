Avatar Component for Orchestra Platform
==============

Avatar Component provide support for driver based avatar provider for your Laravel, PHP or Orchestra Platform application.

[![Latest Stable Version](https://img.shields.io/github/release/orchestral/avatar.svg?style=flat-square)](https://packagist.org/packages/orchestra/avatar)
[![Total Downloads](https://img.shields.io/packagist/dt/orchestra/avatar.svg?style=flat-square)](https://packagist.org/packages/orchestra/avatar)
[![MIT License](https://img.shields.io/packagist/l/orchestra/avatar.svg?style=flat-square)](https://packagist.org/packages/orchestra/avatar)
[![Build Status](https://img.shields.io/travis/orchestral/avatar/3.4.svg?style=flat-square)](https://travis-ci.org/orchestral/avatar)
[![Coverage Status](https://img.shields.io/coveralls/orchestral/avatar/3.4.svg?style=flat-square)](https://coveralls.io/r/orchestral/avatar?branch=3.4)
[![Scrutinizer Quality Score](https://img.shields.io/scrutinizer/g/orchestral/avatar/3.4.svg?style=flat-square)](https://scrutinizer-ci.com/g/orchestral/avatar/)

## Table of Content

* [Version Compatibility](#compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)
* [Change Log](https://github.com/orchestral/avatar/releases)

## Version Compatibility

Laravel  | Avatar
:--------|:---------
 4.1.x   | 2.1.x
 4.2.x   | 2.2.x
 5.0.x   | 3.0.x
 5.1.x   | 3.1.x
 5.2.x   | 3.2.x
 5.3.x   | 3.3.x
 5.4.x   | 3.4.x

## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
	"require": {
		"orchestra/avatar": "~3.0"
	}
}
```

And then run `composer install` to fetch the package.

### Quick Installation

You could also simplify the above code by using the following command:

    composer require "orchestra/avatar=~3.0"

### Configuration

Add `Orchestra\Avatar\AvatarServiceProvider` service provider in `config/app.php`.

```php
'providers' => [

	// ...

	Orchestra\Avatar\AvatarServiceProvider::class,
],
```

You might also want to add `Orchestra\Support\Facades\Avatar` to class aliases in `config/app.php`:

```php
'aliases' => [

	// ...

    'Avatar' => Orchestra\Support\Facades\Avatar::class,
],
```

## Usage

You can easily display an avatar by passing a `User` instance.

```php
<?php

$user = User::find(1);

$avatar = Avatar::user($user)->render();
```
