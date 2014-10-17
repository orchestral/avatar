<?php namespace Orchestra\Avatar;

class Provider
{
    /**
     * Handler instance.
     *
     * @var HandlerInterface
     */
    protected $handler;

    /**
     * Construct a new avatar provider.
     *
     * @param  HandlerInterface $handler
     */
    public function __construct(HandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Make a new avatar by identifier.
     *
     * @param  string   $identifier
     * @return HandlerInterface
     */
    public function make($identifier)
    {
        return $this->handler->setIdentifier($identifier);
    }

    /**
     * Make a new avatar by user object.
     *
     * @param  object   $user
     * @return HandlerInterface
     */
    public function user($user)
    {
        return $this->handler->setIdentifierFromUser($user);
    }

    /**
     * Get current handler.
     *
     * @return HandlerInterface
     */
    public function getHandler()
    {
        return $this->handler;
    }
}
