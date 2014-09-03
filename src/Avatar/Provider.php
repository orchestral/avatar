<?php namespace Orchestra\Avatar;

class Provider
{
    /**
     * Handler instance.
     *
     * @var AvatarHandlerInterface
     */
    protected $handler;

    /**
     * Construct a new avatar provider.
     *
     * @param  AvatarHandlerInterface $handler
     */
    public function __construct(AvatarHandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Make a new avatar by identifier.
     *
     * @param  string   $identifier
     * @return AvatarHandlerInterface
     */
    public function make($identifier)
    {
        return $this->handler->setIdentifier($identifier);
    }

    /**
     * Make a new avatar by user object.
     *
     * @param  object   $user
     * @return AvatarHandlerInterface
     */
    public function user($user)
    {
        return $this->handler->setIdentifierFromUser($user);
    }

    /**
     * Get current handler.
     *
     * @return AvatarHandlerInterface
     */
    public function getHandler()
    {
        return $this->handler;
    }
}
