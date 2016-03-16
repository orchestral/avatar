<?php namespace Orchestra\Avatar;

use Orchestra\Avatar\Contracts\Handler as HandlerContract;

class Provider
{
    /**
     * Handler instance.
     *
     * @var \Orchestra\Avatar\Contracts\Handler
     */
    protected $handler;

    /**
     * Construct a new avatar provider.
     *
     * @param  \Orchestra\Avatar\Contracts\Handler  $handler
     */
    public function __construct(HandlerContract $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Make a new avatar by identifier.
     *
     * @param  string  $identifier
     *
     * @return \Orchestra\Avatar\Contracts\Handler
     */
    public function make($identifier)
    {
        return $this->handler->setIdentifier($identifier);
    }

    /**
     * Make a new avatar by user object.
     *
     * @param  object  $user
     *
     * @return \Orchestra\Avatar\Contracts\Handler
     */
    public function user($user)
    {
        return $this->handler->setIdentifierFromUser($user);
    }

    /**
     * Get current handler.
     *
     * @return \Orchestra\Avatar\Contracts\Handler
     */
    public function getHandler()
    {
        return $this->handler;
    }
}
