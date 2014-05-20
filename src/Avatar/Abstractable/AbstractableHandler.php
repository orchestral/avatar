<?php namespace Orchestra\Avatar\Abstractable;

use Illuminate\Database\Eloquent\Model;

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
     * Maximum rating for avatar (for handler that support it).
     *
     * @var string
     */
    protected $rating;

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
     * @param  string   $rating
     * @return AbstractableHandler
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

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
