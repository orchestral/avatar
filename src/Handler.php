<?php

namespace Orchestra\Avatar;

abstract class Handler
{
    /**
     * Configuration.
     *
     * @var array
     */
    protected $config = [];

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
     * Avatar size.
     *
     * @var string
     */
    protected $size;

    /**
     * Construct a new Avatar handler.
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Set identifier from user object.
     *
     * @param  \Illuminate\Database\Eloquent\Model|object  $user
     *
     * @return $this
     */
    public function setIdentifierFromUser($user, string $attribute = 'email')
    {
        return $this->setIdentifier($user->getAttribute($attribute));
    }

    /**
     * Get user identifier.
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * Set user identifier.
     *
     * @return $this
     */
    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get size.
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * Set size.
     *
     * @return $this
     */
    public function setSize(string $size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Large size.
     *
     * @return $this
     */
    public function large()
    {
        return $this->setSize('large');
    }

    /**
     * Medium size.
     *
     * @return $this
     */
    public function medium()
    {
        return $this->setSize('medium');
    }

    /**
     * Small size.
     *
     * @return $this
     */
    public function small()
    {
        return $this->setSize('small');
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

    /**
     * Render the avatar.
     */
    abstract public function render(): string;
}
