<?php

namespace Orchestra\Avatar\TestCase;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Illuminate\Container\Container;
use Orchestra\Avatar\AvatarServiceProvider;

class AvatarServiceProviderTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    protected function tearDown(): void
    {
        m::close();
    }

    /** @test */
    public function it_deferred_registering_the_services()
    {
        $stub = new AvatarServiceProvider(null);

        $this->assertTrue($stub->isDeferred());
    }

    /** @test */
    public function it_registers_expected_services()
    {
        $app = m::mock('\Illuminate\Container\Container', '\Illuminate\Contracts\Foundation\Application[make]')->makePartial();
        $config = m::mock('\Illuminate\Contracts\Config\Repository', '\ArrayAccess');

        $app->shouldReceive('make')->twice()->with('config')->andReturn($config);
        $config->shouldReceive('get')->once()->with('orchestra.avatar')->andReturn([]);

        $stub = new AvatarServiceProvider($app);

        $this->assertNull($stub->register());
        $this->assertInstanceOf('\Orchestra\Avatar\AvatarManager', $app['orchestra.avatar']);
    }

    /** @test */
    public function testBootMethod()
    {
        $app = new Container();
        $config = m::mock('\Illuminate\Contracts\Config\Repository', '\ArrayAccess');

        $app->instance('config', $config);

        $stub = m::mock('\Orchestra\Avatar\AvatarServiceProvider[addConfigComponent,bootUsingLaravel]', [$app])
                    ->shouldAllowMockingProtectedMethods();

        $stub->shouldReceive('addConfigComponent')->once()
                ->with('orchestra/avatar', 'orchestra/avatar', realpath(__DIR__.'/../resources/config'))
                ->andReturnNull()
            ->shouldReceive('bootUsingLaravel')->once()
                ->with(realpath(__DIR__.'/../resources'))
                ->andReturnNull();

        $this->assertNull($stub->boot());
    }

    /** @test */
    public function it_can_provides_expected_services()
    {
        $stub = new AvatarServiceProvider(null);

        $this->assertContains('orchestra.avatar', $stub->provides());
    }
}
