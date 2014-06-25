<?php namespace Orchestra\Avatar\TestCase;

use Mockery as m;
use Orchestra\Avatar\GravatarHandler;

class GravatarHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Teardown the test environment.
     */
    public function tearDown()
    {
        m::close();
    }

    /**
     * Test Orchestra\Avatar\GravatarHandler::setIdentifierByUser()
     * method.
     *
     * @test
     */
    public function testSetIdentifierByUserMethod()
    {
        $user = m::mock('User');

        $stub = new GravatarHandler(array());

        $user->shouldReceive('getAttribute')->once()->with('email')->andReturn('admin@orchestraplatform.com');

        $this->assertEquals($stub, $stub->setIdentifierFromUser($user));
    }
}
