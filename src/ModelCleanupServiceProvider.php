<?php

namespace Spatie\ModelCleanup;

use Illuminate\Support\ServiceProvider;

class ModelCleanupServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-model-cleanup.php' => config_path('laravel-model-cleanup.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-model-cleanup.php', 'laravel-model-cleanup');

        $this->app->bind('command.clean:models', CleanUpModelsCommand::class);

        $this->commands([
            'command.clean:models',
        ]);
    }
}
