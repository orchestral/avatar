<?php namespace Orchestra\Avatar\TestCase;

use Mockery as m;
use Illuminate\Container\Container;
use Orchestra\Avatar\AvatarServiceProvider;

class AvatarServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testIsDeferredService()
    {
        $app  = new Container;
        $stub = new AvatarServiceProvider($app);

        $this->assertFalse($stub->isDeferred());
    }
}
