<?php

namespace Devtvn\Sociallumen;

use Devtvn\Sociallumen\Commands\VendorPublishCommand;
use Devtvn\Sociallumen\Http\Middleware\CoreAuthMiddleware;
use Devtvn\Sociallumen\Http\Middleware\CoreAuthShopifyMiddleware;
use Devtvn\Sociallumen\Http\Middleware\GlobalJwtMiddleware;
use Devtvn\Sociallumen\Http\Middleware\RefreshMiddleware;
use Devtvn\Sociallumen\Http\Middleware\SocialAuthMiddleware;
use Devtvn\Sociallumen\Http\Middleware\VerifyMiddleware;
use Devtvn\Sociallumen\Service\AppCoreService;
use Devtvn\Sociallumen\Service\Contracts\CoreContract;
use Devtvn\Sociallumen\Service\Contracts\PubSubContract;
use Devtvn\Sociallumen\Service\PubSub\PubSubService;
use Illuminate\Console\Application as Artisan;
use Illuminate\Support\ServiceProvider;


class CoreServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {

        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/debug.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../views', 'core-social');
        app()->routeMiddleware([
            "social.auth"=>SocialAuthMiddleware::class,
            "auth.verify"=>VerifyMiddleware::class,
            "core"=>CoreAuthMiddleware::class,
            "refresh"=>RefreshMiddleware::class,
            "global"=>GlobalJwtMiddleware::class,
            "core.shopify"=>CoreAuthShopifyMiddleware::class,
        ]);
        $this->publishes([
            __DIR__ . '/../config/social.php' => config_path('social.php'),
            __DIR__ . '/../lang' => base_path('resources/lang'),
            __DIR__ . '/../views' => resource_path('views'),
        ], 'core-social');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        Artisan::starting(function($artisan) {
            $artisan->resolveCommands([VendorPublishCommand::class]);
        });

    }

    /**
     * @return void
     */
    public function register()
    {
        foreach (glob(__DIR__ . '/../helpers/*.php') as $file) {
            require_once($file);
        }
        $this->app->singleton(
            CoreContract::class,
            AppCoreService::class);
        $this->app->singleton(
            PubSubContract::class,
            PubSubService::class);

    }
}
