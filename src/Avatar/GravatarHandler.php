<?php namespace Orchestra\Avatar;

use Orchestra\Avatar\Abstractable\AbstractableHandler;

class GravatarHandler extends AbstractableHandler implements AvatarHandlerInterface
{
    /**
     * Service URL.
     */
    const URL = 'http://www.gravatar.com/avatar';

    /**
     * {@inheritdoc}
     */
    protected $name = 'gravatar';

    /**
     * {@inheritdoc}
     */
    public function setIdentifierFromUser($user)
    {
        return $this->setIdentifier($user->getAttribute('email'));
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        return sprintf('%s/%s?s=%d', array(
            static::URL,
            $this->getGravatarIdentifier(),
            $this->getGravatarSize(),
        ));
    }

    /**
     * Get Gravatar identifier.
     *
     * @return string
     */
    protected function getGravatarIdentifier()
    {
        return md5(strtolower(trim($this->getIdentifier())));
    }

    /**
     * Get Gravatar size.
     *
     * @return mixed
     */
    protected function getGravatarSize()
    {
        $size = $this->getSize();

        return array_get($this->config, "sizes.{$size}", 'small');
    }
}
