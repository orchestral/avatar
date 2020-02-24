<?php

namespace Orchestra\Avatar\Tests\Feature;

use Orchestra\Testbench\TestCase as Testbench;

abstract class TestCase extends Testbench
{
    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getPackageAliases($app): array
    {
        return [
            'Avatar' => \Orchestra\Support\Facades\Avatar::class,
        ];
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getPackageProviders($app): array
    {
        return [
            \Orchestra\Avatar\AvatarServiceProvider::class,
        ];
    }
}
