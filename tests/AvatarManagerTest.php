<?php namespace Orchestra\Avatar\TestCase;

use Mockery as m;
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
        $config = [
            'driver' => 'gravatar',
        ];

        $stub = new AvatarManager(null);
        $stub->setConfig($config);

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
        $stub = new AvatarManager(null);
        $stub->setConfig([]);

        $gravatar = $stub->driver('gravatar');

        $this->assertInstanceOf('\Orchestra\Avatar\Provider', $gravatar);
        $this->assertInstanceOf('\Orchestra\Avatar\Handlers\Gravatar', $gravatar->getHandler());
    }
}
