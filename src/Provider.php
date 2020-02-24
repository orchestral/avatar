<?php

namespace Orchestra\Avatar;

use Orchestra\Avatar\Contracts\Handler;

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
     */
    public function __construct(Contracts\Handler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Make a new avatar by identifier.
     */
    public function make(string $identifier): Contracts\Handler
    {
        return $this->handler->setIdentifier($identifier);
    }

    /**
     * Make a new avatar by user object.
     *
     * @param  object  $user
     */
    public function user($user): Contracts\Handler
    {
        return $this->handler->setIdentifierFromUser($user);
    }

    /**
     * Get current handler.
     */
    public function getHandler(): Contracts\Handler
    {
        return $this->handler;
    }
}
