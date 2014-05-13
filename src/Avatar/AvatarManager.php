<?php namespace Orchestra\Avatar;

use Illuminate\Support\Manager;

class AvatarManager extends Manager
{
    protected function getGravatarDriver()
    {
        return new GravatarProvider;
    }

    public function getDefaultDriver()
    {
        return 'gravatar';
    }
}