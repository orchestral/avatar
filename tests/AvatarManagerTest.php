<?php namespace Orchestra\Avatar\TestCase;

use Mockery as m;
use Illuminate\Container\Container;
use Orchestra\Avatar\AvatarManager;

class AvatarManagerTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testGetDefaultDriverMethod()
    {
        $app  = new Container;
        $stub = new AvatarManager($app);

        $this->assertEquals('gravatar', $stub->getDefaultDriver());
    }
}
