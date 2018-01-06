<?php

namespace Orchestra\Avatar\Contracts;

interface Handler
{
    /**
     * @param  string  $identifier
     *
     * @return $this
     */
    public function setIdentifier(string $identifier);

    /**
     * @param  \Illuminate\Database\Eloquent\Model|object  $user
     * @param  string  $attribute
     *
     * @return $this
     */
    public function setIdentifierFromUser($user, string $attribute = 'email');

    /**
     * @param  string  $size
     *
     * @return $this
     */
    public function setSize(string $size);

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
    public function render(): string;
}
