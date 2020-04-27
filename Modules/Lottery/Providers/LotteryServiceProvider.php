<?php

namespace Modules\Lottery\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Lottery\Console\GetLotteryDrawResult;
use Modules\Lottery\Console\GetLotterySchedule;
use Modules\Lottery\Policies\LotteryClassifiedPolicy;
use Modules\Lottery\Policies\LotteryPolicy;
use Modules\Lottery\Policies\LotteryResultPolicy;

class LotteryServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        \Gate::policy(LotteryClassifiedPolicy::class, LotteryClassifiedPolicy::class);
        \Gate::policy(LotteryPolicy::class, LotteryPolicy::class);
        \Gate::policy(LotteryResultPolicy::class, LotteryResultPolicy::class);
        $this->commands(GetLotterySchedule::class);
        $this->commands(GetLotteryDrawResult::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../Config' => config_path('Lottery'),
        ], 'config');
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/lottery');
        $sourcePath = __DIR__ . '/../Resources/views';
        $this->publishes([
            $sourcePath => $viewPath
        ], 'views');
        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/lottery';
        }, \Config::get('view.paths')), [$sourcePath]), 'lottery');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/lottery');
        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'lottery');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'lottery');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (!app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
