<?php

namespace Orchestra\Avatar\Tests\Unit;

use Mockery as m;
use Orchestra\Avatar\Provider;
use PHPUnit\Framework\TestCase;

class ProviderTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    protected function tearDown(): void
    {
        m::close();
    }

    /** @test */
    public function it_can_make_an_avatar_from_email_address()
    {
        $handler = m::mock('\Orchestra\Avatar\Contracts\Handler');

        $handler->shouldReceive('setIdentifier')->once()->with('admin@orchestraplatform.com')->andReturnSelf();

        $stub = new Provider($handler);

        $this->assertEquals($handler, $stub->make('admin@orchestraplatform.com'));
    }

    /** @test */
    public function it_can_make_an_avatar_from_user_instance()
    {
        $user = m::mock('\Illuminate\Database\Eloquent\Model');
        $handler = m::mock('\Orchestra\Avatar\Contracts\Handler', '\Orchestra\Avatar\Handler');

        $handler->shouldReceive('setIdentifierFromUser')->once()->with($user)->andReturnSelf();

        $stub = new Provider($handler);

        $this->assertEquals($handler, $stub->user($user));
    }
}
