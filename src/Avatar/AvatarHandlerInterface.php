<?php namespace Orchestra\Avatar;

interface AvatarHandlerInterface
{
    /**
     * @param  string   $identifier
     * @return AvatarHandlerInterface
     */
    public function setIdentifier($identifier);

    /**
     * @param  string   $rating
     * @return AvatarHandlerInterface
     */
    public function setRating($rating);

    /**
     * @param  string   $size
     * @return AvatarHandlerInterface
     */
    public function setSize($size);

    /**
     * Large size.
     *
     * @return AvatarHandlerInterface
     */
    public function large();

    /**
     * Medium size.
     *
     * @return AvatarHandlerInterface
     */
    public function medium();

    /**
     * Small size.
     *
     * @return AvatarHandlerInterface
     */
    public function small();

    /**
     * Render the avatar.
     *
     * @return string
     */
    public function render();
}
