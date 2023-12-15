<?php

namespace TomatoPHP\TomatoBranches;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;


class TomatoBranchesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \TomatoPHP\TomatoBranches\Console\TomatoBranchesInstall::class,
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-branches.php', 'tomato-branches');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/tomato-branches.php' => config_path('tomato-branches.php'),
        ], 'tomato-branches-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-branches-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-branches');

        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-branches'),
        ], 'tomato-branches-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-branches');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => base_path('lang/vendor/tomato-branches'),
        ], 'tomato-branches-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

    }

    public function boot(): void
    {
        TomatoMenu::register([
            Menu::make()
                ->group(__('Branches'))
                ->label(__('Companies'))
                ->icon('bx bxs-building')
                ->route('admin.companies.index'),
            Menu::make()
                ->group(__('Branches'))
                ->label(__('Branches'))
                ->icon('bx bxs-home-smile')
                ->route('admin.branches.index'),
        ]);
    }
}
