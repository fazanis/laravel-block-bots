<?php

namespace Fazanis\LaravelBlockBots\Providers;

use Fazanis\LaravelBlockBots\BlockBotManager;
use Fazanis\LaravelBlockBots\Console\Commands\DeleteListClientCommand;
use Fazanis\LaravelBlockBots\Http\Middleware\BotsMiddleware;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Agent;
use Mews\Captcha\CaptchaServiceProvider;


class LaravelBlockBotsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/../resources/views/bots' => resource_path('views/vendor/bots'),
        ]);
        $this->publishes([
            __DIR__.'/../config/block-bots.php' => config_path('block-bots.php'),
        ]);
        $this->app->singleton(BlockBotManager::class, function ($app) {
            return new BlockBotManager();
        });
        $this->app->register(CaptchaServiceProvider::class);
        $this->app->alias('Captcha','Mews\Captcha\Facades\Captcha');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/block-bots.php');
        $this->mergeConfigFrom(__DIR__ . '/../config/block-bots.php','block-bots');
        $this->loadViewsFrom(__DIR__ . '/../resources/views/bots', 'bots');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->app->bind(BlockBotManager::class);
//        app('router')->aliasMiddleware('bot-middleware-alias', BotsMiddleware::class);
        app('router')->aliasMiddleware(
            'bot_block',
            BotsMiddleware::class
        );
        if ($this->app->runningInConsole()) {
            $this->commands([
                DeleteListClientCommand::class
            ]);
        }

    }
}
