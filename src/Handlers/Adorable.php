<?php

namespace Orchestra\Avatar\Handlers;

class Adorable extends Handler implements HandlerContract
{
    /**
     * Service URL.
     */
    const URL = '//api.adorable.io/avatars';

    /**
     * {@inheritdoc}
     */
    protected $name = 'adorable';

    /**
     * {@inheritdoc}
     */
    public function render(): string
    {
        $url = \sprintf(
            '%s/%d/%s.png',
            static::URL,
            $this->getAvatarIdentifier(),
            $this->getAvatarSize()
        );

        return $url;
    }

    /**
     * Get Gravatar identifier.
     */
    protected function getAvatarIdentifier(): string
    {
        return \trim($this->getIdentifier());
    }

    /**
     * Get Gravatar size.
     */
    protected function getAvatarSize(): string
    {
        $size = $this->getSize();

        return $this->config['sizes'][$size] ?? (\is_int($size) ? $size : 128);
    }
}
