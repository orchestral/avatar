<?php namespace Orchestra\Avatar\TestCase;

use Mockery as m;
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
     * Test Orchestra\Avatar\AvatarServiceProvider is a deferred service
     * provider.
     *
     * @test
     */
    public function testIsDeferredService()
    {
        $stub = new AvatarServiceProvider(null);

        $this->assertTrue($stub->isDeferred());
    }

    /**
     * Test Orchestra\Avatar\AvatarServiceProvider::register()
     * method.
     *
     * @test
     */
    public function testRegisterMethod()
    {
        $app = m::mock('\Illuminate\Container\Container[singleton]');

        $app->shouldReceive('singleton')->once()->with('orchestra.avatar', m::type('Closure'))
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
        $stub = m::mock('\Orchestra\Avatar\AvatarServiceProvider[addConfigComponent]', array(null));

        $stub->shouldReceive('addConfigComponent')->once()
            ->with('orchestra/avatar', 'orchestra/avatar', realpath(__DIR__.'/../resources/config'))
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
        $stub = new AvatarServiceProvider(null);

        $this->assertContains('orchestra.avatar', $stub->provides());
    }
}
