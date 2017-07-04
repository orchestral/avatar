<?php

namespace Orchestra\Avatar\Handlers;

use Illuminate\Support\Arr;
use Orchestra\Avatar\Handler;
use Orchestra\Avatar\Contracts\Handler as HandlerContract;

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
    public function render()
    {
        $url = sprintf(
            '%s/%s?s=%d',
            static::URL,
            $this->getGravatarIdentifier(),
            $this->getGravatarSize()
        );

        if (! is_null($default = $this->config['gravatar']['default'] ?? null)) {
            $url .= '&d='.urlencode($default);
        }

        return $url;
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

        return $this->config['sizes'][$size] ?? (is_int($size) ? $size : 'small');
    }
}
