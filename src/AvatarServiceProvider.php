<?php

namespace Orchestra\Avatar;

use Illuminate\Contracts\Foundation\Application;
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
        $this->app->singleton('orchestra.avatar', function (Application $app) {
            $manager = new AvatarManager($app);
            $namespace = $this->hasPackageRepository() ? 'orchestra/avatar::' : 'orchestra.avatar';

            $manager->setConfig($app->make('config')->get($namespace));

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
        $path = \realpath(__DIR__.'/../resources');

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
    protected function bootUsingLaravel(string $path): void
    {
        $this->mergeConfigFrom("{$path}/config/config.php", 'orchestra.avatar');

        $this->publishes([
            "{$path}/config/config.php" => \config_path('orchestra/avatar.php'),
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
