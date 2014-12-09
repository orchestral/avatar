<?php namespace Orchestra\Avatar;

class Provider
{
    /**
     * Handler instance.
     *
     * @var \Orchestra\Avatar\HandlerInterface
     */
    protected $handler;

    /**
     * Construct a new avatar provider.
     *
     * @param  \Orchestra\AvatarHandlerInterface  $handler
     */
    public function __construct(HandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Make a new avatar by identifier.
     *
     * @param  string  $identifier
     * @return \Orchestra\AvatarHandlerInterface
     */
    public function make($identifier)
    {
        return $this->handler->setIdentifier($identifier);
    }

    /**
     * Make a new avatar by user object.
     *
     * @param  object  $user
     * @return \Orchestra\Avatar\HandlerInterface
     */
    public function user($user)
    {
        return $this->handler->setIdentifierFromUser($user);
    }

    /**
     * Get current handler.
     *
     * @return \Orchestra\Avatar\HandlerInterface
     */
    public function getHandler()
    {
        return $this->handler;
    }
}
