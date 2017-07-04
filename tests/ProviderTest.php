<?php namespace Orchestra\Avatar\TestCase;

use Mockery as m;
use Orchestra\Avatar\Provider;
use PHPUnit\Framework\TestCase;

class ProviderTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    public function tearDown()
    {
        m::close();
    }

    /**
     * Test Orchestra\Avatar\Provider::make() method.
     *
     * @test
     */
    public function testMakeMethod()
    {
        $handler = m::mock('\Orchestra\Avatar\Contracts\Handler');

        $handler->shouldReceive('setIdentifier')->once()->with('admin@orchestraplatform.com')->andReturnSelf();

        $stub = new Provider($handler);

        $this->assertEquals($handler, $stub->make('admin@orchestraplatform.com'));
    }

    /**
     * Test Orchestra\Avatar\Provider::user() method.
     *
     * @test
     */
    public function testUserMethod()
    {
        $user    = m::mock('\Illuminate\Database\Eloquent\Model');
        $handler = m::mock('\Orchestra\Avatar\Contracts\Handler', '\Orchestra\Avatar\Handler');

        $handler->shouldReceive('setIdentifierFromUser')->once()->with($user)->andReturnSelf();

        $stub = new Provider($handler);

        $this->assertEquals($handler, $stub->user($user));
    }
}
