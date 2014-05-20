<?php namespace Orchestra\Avatar;

use Orchestra\Avatar\Abstractable\AbstractableHandler;

class GravatarHandler extends AbstractableHandler implements AvatarHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'gravatar';

    /**
     * {@inheritdoc}
     */
    public function setIdentifierFromUser($user)
    {
        return $this->setIdentifier($user->getAttribute('email'));
    }

    /**
     * {@inheritdoc}
     */
    public function large()
    {
        // TODO: Implement large() method.
    }

    /**
     * {@inheritdoc}
     */
    public function medium()
    {
        // TODO: Implement medium() method.
    }

    /**
     * {@inheritdoc}
     */
    public function small()
    {
        // TODO: Implement small() method.
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        // TODO: Implement render() method.
    }
}
