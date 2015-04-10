<?php

namespace Piyushpatil\Androidpushnotification;

use Illuminate\Support\ServiceProvider;

class AndroidpushnotificationServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        $this->publishes([
            __DIR__ . '/../../config/config.php' => config_path('androidpushnotification.php'),
                ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //
        $this->app['pushNotification'] = $this->app->share(function($app) {
            return new PushNotification();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return [];
    }

}
