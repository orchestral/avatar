<?php

namespace Orchestra\Avatar\Tests\Unit\Handlers;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Orchestra\Avatar\Handlers\Gravatar;

class GravatarTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    protected function tearDown(): void
    {
        m::close();
    }

    /** @test */
    public function it_can_set_identifier_by_user()
    {
        $user = m::mock('\Illuminate\Database\Eloquent\Model');

        $stub = new Gravatar([]);

        $user->shouldReceive('getAttribute')->once()->with('email')->andReturn('admin@orchestraplatform.com');

        $this->assertEquals($stub, $stub->setIdentifierFromUser($user));
        $this->assertEquals('admin@orchestraplatform.com', $stub->getIdentifier());
    }

    /** @test */
    public function it_can_render_the_avatar()
    {
        $user = m::mock('\Illuminate\Database\Eloquent\Model');
        $config = [
            'sizes' => [
                'small' => '50',
                'medium' => '100',
                'large' => '150',
            ],
        ];

        $stub = new Gravatar($config);

        $user->shouldReceive('getAttribute')->once()->with('email')->andReturn('admin@orchestraplatform.com');

        $stub->setIdentifierFromUser($user);

        $this->assertStringContainsString('16b8346897684007cd4fb6e7e55204a7?s=50', $stub->small()->render());
        $this->assertStringContainsString('16b8346897684007cd4fb6e7e55204a7?s=100', $stub->medium()->render());
        $this->assertStringContainsString('16b8346897684007cd4fb6e7e55204a7?s=150', $stub->large()->render());
        $this->assertStringContainsString('16b8346897684007cd4fb6e7e55204a7?s=150', (string) $stub->large());
    }

    /**
     * Test Orchestra\Avatar\GravatarHandler::render()
     * method with default url.
     *
     * @test
     */
    public function it_can_render_the_default_avatar_for_unknown_email()
    {
        $user = m::mock('\Illuminate\Database\Eloquent\Model');
        $config = [
            'sizes' => [
                'small' => '50',
                'medium' => '100',
                'large' => '150',
            ],
            'gravatar' => [
                'default' => 'http://foobar.com/images.jpg',
            ],
        ];

        $stub = new Gravatar($config);

        $user->shouldReceive('getAttribute')->once()->with('email')->andReturn('admin@orchestraplatform.com');

        $stub->setIdentifierFromUser($user);

        $this->assertStringContainsString(
            '16b8346897684007cd4fb6e7e55204a7?s=50&d=http%3A%2F%2Ffoobar.com%2Fimages.jpg', $stub->small()->render()
        );
    }
}
