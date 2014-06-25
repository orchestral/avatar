<?php namespace Orchestra\Avatar;

use Illuminate\Support\Manager;

class AvatarManager extends Manager
{
    /**
     * Get Gravatar driver.
     *
     * @return Provider
     */
    protected function createGravatarDriver()
    {
        return new Provider(new GravatarHandler);
    }

    /**
     * Get default driver.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']->get('orchestra/avatar::driver', 'gravatar');
    }
}