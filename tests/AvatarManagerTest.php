<?php namespace Orchestra\Avatar\TestCase;

use Mockery as m;
use Illuminate\Container\Container;
use Orchestra\Avatar\AvatarManager;

class AvatarManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Teardown the test environment.
     */
    public function tearDown()
    {
        m::close();
    }

    /**
     * Test Orchestra\Avatar\AvatarManager::getDefaultDriver()
     * method.
     *
     * @test
     */
    public function testGetDefaultDriverMethod()
    {
        $app = new Container;
        $app['config'] = $config = m::mock('\Illuminate\Config\Repository');

        $config->shouldReceive('get')->once()->with('orchestra/avatar::driver', 'gravatar')
            ->andReturn('gravatar');

        $stub = new AvatarManager($app);

        $this->assertEquals('gravatar', $stub->getDefaultDriver());
    }

    /**
     * Test Orchestra\Avatar\AvatarManager::createGravatarDriver()
     * method.
     *
     * @test
     */
    public function testCreateGravatarDriverMethod()
    {
        $app = new Container;
        $stub = new AvatarManager($app);

        $gravatar = $stub->driver('gravatar');

        $this->assertInstanceOf('\Orchestra\Avatar\Provider', $gravatar);
        $this->assertInstanceOf('\Orchestra\Avatar\GravatarHandler', $gravatar->getHandler());

    }
}
