Avatar Package for Laravel and PHP
==============

Avatar Package provide support for driver based avatar provider for your Laravel, PHP or Orchestra Platform application.

[![Latest Stable Version](https://poser.pugx.org/orchestra/avatar/v/stable.png)](https://packagist.org/packages/orchestra/avatar)
[![Total Downloads](https://poser.pugx.org/orchestra/avatar/downloads.png)](https://packagist.org/packages/orchestra/avatar)
[![Build Status](https://travis-ci.org/orchestral/avatar.svg?branch=master)](https://travis-ci.org/orchestral/avatar)
[![Coverage Status](https://coveralls.io/repos/orchestral/avatar/badge.png?branch=master)](https://coveralls.io/r/orchestral/avatar?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/orchestral/avatar/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/orchestral/avatar/?branch=master)

## Table of Content

* [Version Compatibility](#compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)
* [Change Log](http://orchestraplatform.com/docs/latest/components/avatar/changes#v3-0)

## Version Compatibility

Laravel  | Avatar
:--------|:---------
 4.1.x   | 2.1.x
 4.2.x   | 2.2.x
 5.0.x   | 3.0.x@dev

## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
	"require": {
		"orchestra/avatar": "3.0.*"
	}
}
```

And then run `composer install` to fetch the package.

### Quick Installation

You could also simplify the above code by using the following command:

```
composer require "orchestra/avatar=3.0.*"
```

### Configuration

Add `Orchestra\Avatar\AvatarServiceProvider` service provider in `app/config/app.php`.

```php
'providers' => array(

	// ...
	'Orchestra\Avatar\AvatarServiceProvider',
),
```

You might also want to add `Orchestra\Support\Facade\Avatar` to class aliases in `app/config/app.php`:

```php
'aliases' => array(

	// ...
	'Avatar' => 'Orchestra\Support\Facade\Avatar',
),
```

## Usage

You can easily display an avatar by passing a `User` instance.

```php
<?php

$user = User::find(1);

$avatar = Avatar::user($user)->render();
```
