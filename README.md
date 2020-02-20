Avatar Component for Orchestra Platform
==============

Avatar Component provide support for driver based avatar provider for your Laravel, PHP or Orchestra Platform application.

[![Build Status](https://travis-ci.org/orchestral/avatar.svg?branch=5.x)](https://travis-ci.org/orchestral/avatar)
[![Latest Stable Version](https://poser.pugx.org/orchestra/avatar/version)](https://packagist.org/packages/orchestra/avatar)
[![Total Downloads](https://poser.pugx.org/orchestra/avatar/downloads)](https://packagist.org/packages/orchestra/avatar)
[![Latest Unstable Version](https://poser.pugx.org/orchestra/avatar/v/unstable)](//packagist.org/packages/orchestra/avatar)
[![License](https://poser.pugx.org/orchestra/avatar/license)](https://packagist.org/packages/orchestra/avatar)
[![Coverage Status](https://coveralls.io/repos/github/orchestral/avatar/badge.svg?branch=5.x)](https://coveralls.io/github/orchestral/avatar?branch=5.x)

## Table of Content

* [Version Compatibility](#compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)
* [Changelog](https://github.com/orchestral/avatar/releases)

## Version Compatibility

Laravel  | Avatar
:--------|:---------
 5.5.x   | 3.5.x
 5.6.x   | 3.6.x
 5.7.x   | 3.7.x
 5.8.x   | 3.8.x
 6.x     | 4.x
 7.x     | 5.x
 
## Installation

To install through composer, run the following command from terminal:

    composer require "orchestra/avatar"

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
