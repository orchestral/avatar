<?php namespace Orchestra\Avatar\TestCase;

use Mockery as m;
use Orchestra\Avatar\Provider;

class ProviderTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testMakeMethod()
    {
        $handler = m::mock('\Orchestra\Avatar\AvatarHandlerInterface');

        $handler->shouldReceive('setIdentifier')->once()->with('admin@orchestraplatform.com')->andReturnSelf();

        $stub = new Provider($handler);

        $this->assertEquals($handler, $stub->make('admin@orchestraplatform.com'));
    }
}
