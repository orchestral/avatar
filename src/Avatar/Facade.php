<?php namespace Orchestra\Avatar;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'orchestra.avatar';
    }
}
