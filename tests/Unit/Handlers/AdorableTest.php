<?php

namespace Orchestra\Avatar\Tests\Unit\Handlers;

use Mockery as m;
use Orchestra\Avatar\Handlers\Adorable;
use PHPUnit\Framework\TestCase;

class AdorableTest extends TestCase
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
        $user = m::mock('Illuminate\Database\Eloquent\Model');

        $stub = new Adorable([]);

        $user->shouldReceive('getAttribute')->once()->with('email')->andReturn('admin@orchestraplatform.com');

        $this->assertEquals($stub, $stub->setIdentifierFromUser($user));
        $this->assertEquals('admin@orchestraplatform.com', $stub->getIdentifier());
    }

    /** @test */
    public function it_can_render_the_avatar()
    {
        $user = m::mock('Illuminate\Database\Eloquent\Model');
        $config = [
            'sizes' => [
                'small' => '50',
                'medium' => '100',
                'large' => '150',
            ],
        ];

        $stub = new Adorable($config);

        $user->shouldReceive('getAttribute')->once()->with('email')->andReturn('admin@orchestraplatform.com');

        $stub->setIdentifierFromUser($user);

        $this->assertStringContainsString('//api.adorable.io/avatars/50/admin@orchestraplatform.com.png', $stub->small()->render());
        $this->assertStringContainsString('//api.adorable.io/avatars/100/admin@orchestraplatform.com.png', $stub->medium()->render());
        $this->assertStringContainsString('//api.adorable.io/avatars/150/admin@orchestraplatform.com.png', $stub->large()->render());
        $this->assertStringContainsString('//api.adorable.io/avatars/150/admin@orchestraplatform.com.png', (string) $stub->large());
    }
}
