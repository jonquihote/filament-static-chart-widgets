<?php

namespace JQHT\FilamentStaticChartWidgets;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentStaticChartWidgetsServiceProvider extends PluginServiceProvider
{
    protected array $styles = [
        'filament-static-chart-widgets-styles' => __DIR__.'/../public/css/styles.css',
    ];

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-static-chart-widgets')
            ->hasViews();
    }
}
