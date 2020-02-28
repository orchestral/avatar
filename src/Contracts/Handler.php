<?php

namespace Orchestra\Avatar\Contracts;

interface Handler
{
    /**
     * @return $this
     */
    public function setIdentifier(string $identifier);

    /**
     * @param  \Illuminate\Database\Eloquent\Model|object  $user
     *
     * @return $this
     */
    public function setIdentifierFromUser($user, string $attribute = 'email');

    /**
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
     */
    public function render(): string;
}
