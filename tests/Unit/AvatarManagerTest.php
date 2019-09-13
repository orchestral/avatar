<?php

namespace Orchestra\Avatar\Tests\Unit;

use Mockery as m;
use Orchestra\Avatar\AvatarManager;
use PHPUnit\Framework\TestCase;

class AvatarManagerTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    protected function tearDown(): void
    {
        m::close();
    }

    /** @test */
    public function it_can_resolve_default_driver()
    {
        $config = [
            'driver' => 'gravatar',
        ];

        $container = m::mock('Illuminate\Contracts\Container\Container');
        $container->shouldReceive('make')->with('config')->andReturn(m::mock('Illuminate\Contracts\Config\Repository'));

        $stub = new AvatarManager($container);
        $stub->setConfiguration($config);

        $this->assertEquals('gravatar', $stub->getDefaultDriver());
    }

    /** @test */
    public function it_can_create_gravatar_driver()
    {
        $container = m::mock('Illuminate\Contracts\Container\Container');
        $container->shouldReceive('make')->with('config')->andReturn(m::mock('Illuminate\Contracts\Config\Repository'));

        $stub = new AvatarManager($container);
        $stub->setConfiguration([]);

        $gravatar = $stub->driver('gravatar');

        $this->assertInstanceOf('Orchestra\Avatar\Provider', $gravatar);
        $this->assertInstanceOf('Orchestra\Avatar\Handlers\Gravatar', $gravatar->getHandler());
    }
}
