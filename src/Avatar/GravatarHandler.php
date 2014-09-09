<?php namespace Orchestra\Avatar;

use Illuminate\Support\Arr;
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
    public function render()
    {
        $url = sprintf(
            '%s/%s?s=%d',
            static::URL,
            $this->getGravatarIdentifier(),
            $this->getGravatarSize()
        );

        if (! is_null($default = Arr::get($this->config, 'gravatar.default'))) {
            $url .= "&d=".urlencode($default);
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

        return Arr::get($this->config, "sizes.{$size}", 'small');
    }
}
