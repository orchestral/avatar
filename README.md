Avatar Component for Orchestra Platform
==============

[![Join the chat at https://gitter.im/orchestral/platform/components](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/orchestral/platform/components?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Avatar Component provide support for driver based avatar provider for your Laravel, PHP or Orchestra Platform application.

[![Latest Stable Version](https://img.shields.io/github/release/orchestral/avatar.svg?style=flat-square)](https://packagist.org/packages/orchestra/avatar)
[![Total Downloads](https://img.shields.io/packagist/dt/orchestra/avatar.svg?style=flat-square)](https://packagist.org/packages/orchestra/avatar)
[![MIT License](https://img.shields.io/packagist/l/orchestra/avatar.svg?style=flat-square)](https://packagist.org/packages/orchestra/avatar)
[![Build Status](https://img.shields.io/travis/orchestral/avatar/3.2.svg?style=flat-square)](https://travis-ci.org/orchestral/avatar)
[![Coverage Status](https://img.shields.io/coveralls/orchestral/avatar/3.2.svg?style=flat-square)](https://coveralls.io/r/orchestral/avatar?branch=3.2)
[![Scrutinizer Quality Score](https://img.shields.io/scrutinizer/g/orchestral/avatar/3.2.svg?style=flat-square)](https://scrutinizer-ci.com/g/orchestral/avatar/)

## Table of Content

* [Version Compatibility](#compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)
* [Change Log](http://orchestraplatform.com/docs/latest/components/avatar/changes#v3-2)

## Version Compatibility

Laravel  | Avatar
:--------|:---------
 4.1.x   | 2.1.x
 4.2.x   | 2.2.x
 5.0.x   | 3.0.x
 5.1.x   | 3.1.x
 5.2.x   | 3.2.x

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

You might also want to add `Orchestra\Support\Facade\Avatar` to class aliases in `config/app.php`:

```php
'aliases' => [

	// ...

    'Avatar' => Orchestra\Support\Facade\Avatar::class,
],
```

## Usage

You can easily display an avatar by passing a `User` instance.

```php
<?php

$user = User::find(1);

$avatar = Avatar::user($user)->render();
```
