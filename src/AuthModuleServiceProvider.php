<?php

namespace Zdrojowa\AuthModule;

use Illuminate\Support\ServiceProvider;

/**
 * Class AuthModuleServiceProvider
 * @package Zdrojowa\AuthModule
 */
class AuthModuleServiceProvider extends ServiceProvider
{

    /**
     *
     */
    public function boot()
    {
        $this->loadViews()->loadTranslations();
    }

    /**
     *
     */
    public function register()
    {

    }

    /**
     * @return AuthModuleServiceProvider
     */
    protected function loadViews(): AuthModuleServiceProvider
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'AuthModule');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/' . 'AuthModule'),
        ], 'views');

        return $this;
    }

    /**
     * @return AuthModuleServiceProvider
     */
    protected function loadTranslations(): AuthModuleServiceProvider
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'AuthModule');

        $this->publishes([
            __DIR__ . '/../resources/lang/' => resource_path('lang/vendor/' . 'AuthModule'),
        ], 'views');

        return $this;
    }

}
