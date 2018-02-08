Avatar Component for Orchestra Platform
==============

Avatar Component provide support for driver based avatar provider for your Laravel, PHP or Orchestra Platform application.

[![Build Status](https://travis-ci.org/orchestral/avatar.svg?branch=master)](https://travis-ci.org/orchestral/avatar)
[![Latest Stable Version](https://poser.pugx.org/orchestra/avatar/version)](https://packagist.org/packages/orchestra/avatar)
[![Total Downloads](https://poser.pugx.org/orchestra/avatar/downloads)](https://packagist.org/packages/orchestra/avatar)
[![Latest Unstable Version](https://poser.pugx.org/orchestra/avatar/v/unstable)](//packagist.org/packages/orchestra/avatar)
[![License](https://poser.pugx.org/orchestra/avatar/license)](https://packagist.org/packages/orchestra/avatar)

## Table of Content

* [Version Compatibility](#compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)
* [Changelog](https://github.com/orchestral/avatar/releases)

## Version Compatibility

Laravel  | Avatar
:--------|:---------
 4.x.x   | 2.x.x
 5.0.x   | 3.0.x
 5.1.x   | 3.1.x
 5.2.x   | 3.2.x
 5.3.x   | 3.3.x
 5.4.x   | 3.4.x
 5.5.x   | 3.5.x
 5.6.x   | 3.6.x
 5.7.x   | 3.7.x@dev
 
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
