<?php namespace Orchestra\Avatar;

use Illuminate\Support\Manager;

class AvatarManager extends Manager
{
    protected function getGravatarDriver()
    {
        return new Provider(new GravatarHandler);
    }

    public function getDefaultDriver()
    {
        return 'gravatar';
    }
}