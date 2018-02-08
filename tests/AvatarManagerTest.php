<?php

namespace Orchestra\Avatar\TestCase;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Orchestra\Avatar\AvatarManager;

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

        $stub = new AvatarManager(null);
        $stub->setConfig($config);

        $this->assertEquals('gravatar', $stub->getDefaultDriver());
    }

    /** @test */
    public function it_can_create_gravatar_driver()
    {
        $stub = new AvatarManager(null);
        $stub->setConfig([]);

        $gravatar = $stub->driver('gravatar');

        $this->assertInstanceOf('\Orchestra\Avatar\Provider', $gravatar);
        $this->assertInstanceOf('\Orchestra\Avatar\Handlers\Gravatar', $gravatar->getHandler());
    }
}
