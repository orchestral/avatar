<?php namespace Orchestra\Avatar;

use Orchestra\Support\Providers\ServiceProvider;

class AvatarServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('orchestra.avatar', function ($app) {
            $manager = new AvatarManager($app);
            $namespace = $this->hasPackageRepository() ? 'orchestra/avatar::' : 'orchestra.avatar';

            $manager->setConfig($app['config'][$namespace]);

            return $manager;
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../resources');

        $this->addConfigComponent('orchestra/avatar', 'orchestra/avatar', $path.'/config');

        if (! $this->hasPackageRepository()) {
            $this->bootUsingLaravel($path);
        }
    }

    /**
     * Boot under Laravel setup.
     *
     * @param  string  $path
     *
     * @return void
     */
    protected function bootUsingLaravel($path)
    {
        $this->mergeConfigFrom("{$path}/config/config.php", 'orchestra.avatar');

        $this->publishes([
            "{$path}/config/config.php" => config_path('orchestra/avatar.php'),
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['orchestra.avatar'];
    }
}
