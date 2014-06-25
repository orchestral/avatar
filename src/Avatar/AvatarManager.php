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
        $config = $this->app['config']->get('orchestra/avatar');
        
        return new Provider(new GravatarHandler($config));
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