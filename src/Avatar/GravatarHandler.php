<?php namespace Orchestra\Avatar;

use Orchestra\Avatar\Abstractable\AbstractableHandler;

class GravatarHandler extends AbstractableHandler implements AvatarHandlerInterface
{
    /**
     * Name of the handler.
     *
     * @var string
     */
    protected $name = 'gravatar';

    /**
     * Render the avatar.
     *
     * @return string
     */
    public function render()
    {
        // TODO: Implement render() method.
    }
}
