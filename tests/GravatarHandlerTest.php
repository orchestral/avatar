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
        $this->assertEquals('admin@orchestraplatform.com', $stub->getIdentifier());
    }

    /**
     * Test Orchestra\Avatar\GravatarHandler::render()
     * method.
     *
     * @test
     */
    public function testRenderMethod()
    {
        $user = m::mock('User');
        $config = array(
            'sizes' => array(
                'small'  => '50',
                'medium' => '100',
                'large'  => '150',
            )
        );

        $stub = new GravatarHandler($config);

        $user->shouldReceive('getAttribute')->once()->with('email')->andReturn('admin@orchestraplatform.com');

        $stub->setIdentifierFromUser($user);

        $this->assertContains('16b8346897684007cd4fb6e7e55204a7?s=50', $stub->small()->render());
        $this->assertContains('16b8346897684007cd4fb6e7e55204a7?s=100', $stub->medium()->render());
        $this->assertContains('16b8346897684007cd4fb6e7e55204a7?s=150', $stub->large()->render());
        $this->assertContains('16b8346897684007cd4fb6e7e55204a7?s=150', (string) $stub->large());
    }

    /**
     * Test Orchestra\Avatar\GravatarHandler::render()
     * method with default url.
     *
     * @test
     */
    public function testRenderMethodWithDefaultUrl()
    {
        $user = m::mock('User');
        $config = array(
            'sizes' => array(
                'small'  => '50',
                'medium' => '100',
                'large'  => '150',
            ),
            'gravatar' => array(
                'default' => 'http://foobar.com/images.jpg',
            ),
        );

        $stub = new GravatarHandler($config);

        $user->shouldReceive('getAttribute')->once()->with('email')->andReturn('admin@orchestraplatform.com');

        $stub->setIdentifierFromUser($user);

        $this->assertContains('16b8346897684007cd4fb6e7e55204a7?s=50&d=http%3A%2F%2Ffoobar.com%2Fimages.jpg', $stub->small()->render());
    }
}
