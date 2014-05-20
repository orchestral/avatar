<?php namespace Orchestra\Avatar\Abstractable;

abstract class AbstractableHandler
{
    /**
     * Name of the handler.
     *
     * @var string
     */
    protected $name;

    /**
     * Render the avatar.
     *
     * @return string
     */
    abstract public function render();

    /**
     * Render the avatar.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }
}
