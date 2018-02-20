<?php

namespace Orchestra\Avatar\TestCase\Unit;

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
    public function it_can_provides_expected_services()
    {
        $stub = new AvatarServiceProvider(null);

        $this->assertContains('orchestra.avatar', $stub->provides());
    }
}
