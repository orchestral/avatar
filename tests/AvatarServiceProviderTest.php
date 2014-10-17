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
     * Test Orchestra\Avatar\AvatarServiceProvider::register()
     * method.
     *
     * @test
     */
    public function testRegisterMethod()
    {
        $app = m::mock('\Illuminate\Container\Container[bindShared]');

        $app->shouldReceive('bindShared')->once()->with('orchestra.avatar', m::type('Closure'))
            ->andReturnUsing(function ($n, $c) use ($app) {
                $app[$n] = $c($app);
            });

        $stub = new AvatarServiceProvider($app);

        $this->assertNull($stub->register());
        $this->assertInstanceOf('\Orchestra\Avatar\AvatarManager', $app['orchestra.avatar']);
    }

    /**
     * Test Orchestra\Avatar\AvatarServiceProvider::boot()
     * method.
     *
     * @test
     */
    public function testBootMethod()
    {
        $app = new Container;

        $stub = m::mock('\Orchestra\Avatar\AvatarServiceProvider[package]', array($app));

        $stub->shouldReceive('package')->once()
            ->with('orchestra/avatar', 'orchestra/avatar', realpath(__DIR__.'/../src'))
            ->andReturnNull();

        $this->assertNull($stub->boot());
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
