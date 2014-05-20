<?php namespace Orchestra\Avatar;

interface AvatarHandlerInterface
{
    /**
     * Render the avatar.
     *
     * @return string
     */
    public function render();
}
