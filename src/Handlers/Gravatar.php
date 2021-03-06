<?php

namespace Orchestra\Avatar\Handlers;

use Orchestra\Avatar\Contracts\Handler as HandlerContract;
use Orchestra\Avatar\Handler;

class Gravatar extends Handler implements HandlerContract
{
    /**
     * Service URL.
     */
    const URL = '//www.gravatar.com/avatar';

    /**
     * {@inheritdoc}
     */
    protected $name = 'gravatar';

    /**
     * {@inheritdoc}
     */
    public function render(): string
    {
        $url = \sprintf(
            '%s/%s?s=%d',
            static::URL,
            $this->getGravatarIdentifier(),
            $this->getGravatarSize()
        );

        if (! \is_null($default = $this->config['gravatar']['default'] ?? null)) {
            $url .= '&d='.\urlencode($default);
        }

        return $url;
    }

    /**
     * Get Gravatar identifier.
     */
    protected function getGravatarIdentifier(): string
    {
        return \md5(\strtolower(\trim($this->getIdentifier())));
    }

    /**
     * Get Gravatar size.
     */
    protected function getGravatarSize(): string
    {
        $size = $this->getSize();

        return $this->config['sizes'][$size] ?? (\is_int($size) ? $size : $this->config['sizes']['small']);
    }
}
