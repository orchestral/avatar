<?php

namespace Orchestra\Avatar;

interface HandlerInterface
{
    /**
     * @param  string  $identifier
     *
     * @return $this
     */
    public function setIdentifier($identifier);

    /**
     * @param  \Illuminate\Database\Eloquent\Model|object  $user
     * @param  string  $attribute
     *
     * @return $this
     */
    public function setIdentifierFromUser($user, $attribute = 'email');

    /**
     * @param  string  $size
     *
     * @return $this
     */
    public function setSize($size);

    /**
     * Large size.
     *
     * @return $this
     */
    public function large();

    /**
     * Medium size.
     *
     * @return $this
     */
    public function medium();

    /**
     * Small size.
     *
     * @return $this
     */
    public function small();

    /**
     * Render the avatar.
     *
     * @return string
     */
    public function render();
}
