<?php namespace Orchestra\Avatar;

class Provider
{
    protected $handler;

    public function __construct(AvatarHandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    public function user($user)
    {
        //
    }
}