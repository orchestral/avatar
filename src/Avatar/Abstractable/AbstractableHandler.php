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
     * Identifier which normally would be the email address.
     *
     * @var string
     */
    protected $identifier;

    /**
     *
     * @var string
     */
    protected $size;

    /**
     * Set indentifier from user object.
     *
     * @param  \Illuminate\Database\Eloquent\Model|object   $user
     * @return AbstractableHandler
     */
    abstract public function setIdentifierFromUser($user);

    /**
     * Render the avatar.
     *
     * @return string
     */
    abstract public function render();

    /**
     * @param  string   $identifier
     * @return AbstractableHandler
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @param  string   $size
     * @return AbstractableHandler
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

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
