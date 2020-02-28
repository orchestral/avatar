<?php

namespace Orchestra\Avatar;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Support\DeferrableProvider;
use Orchestra\Support\Providers\ServiceProvider;

class AvatarServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('orchestra.avatar', function (Container $app) {
            $manager = new AvatarManager($app);
            $namespace = $this->hasPackageRepository() ? 'orchestra/avatar::' : 'orchestra.avatar';

            $manager->setConfiguration($app->make('config')->get($namespace));

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
        $path = \realpath(__DIR__.'/../');

        $this->addConfigComponent('orchestra/avatar', 'orchestra/avatar', $path.'/config');

        if (! $this->hasPackageRepository()) {
            $this->bootUsingLaravel($path);
        }
    }

    /**
     * Boot under Laravel setup.
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
