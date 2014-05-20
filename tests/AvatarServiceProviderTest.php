<?php namespace Orchestra\Avatar\TestCase;

use Mockery as m;
use Illuminate\Container\Container;
use Orchestra\Avatar\AvatarServiceProvider;

class AvatarServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Teardown the test environment.
     */
    public function tearDown()
    {
        m::close();
    }

    /**
     * Test Orchestra\Avatar\AvatarServiceProvider is not
     * a deferred service provider.
     *
     * @test
     */
    public function testIsNotDeferredService()
    {
        $app  = new Container;
        $stub = new AvatarServiceProvider($app);

        $this->assertFalse($stub->isDeferred());
    }

    /**
     * Test Orchestra\Avatar\AvatarServiceProvider::provides()
     * method.
     *
     * @test
     */
    public function testProvidesMethod()
    {
        $app  = new Container;
        $stub = new AvatarServiceProvider($app);

        $this->assertContains('orchestra.avatar', $stub->provides());
    }
}
